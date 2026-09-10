# Use cases — Routeplanner Veldonia

Uitgewerkte use cases bij de opdracht *Software Development 3*.
Elke use case hoort bij één user story (max. 1 lesuur) en bevat het hoofdscenario,
de uitzonderingen en de acceptatiecriteria waaraan je werk getoetst wordt.

**Actoren**

| Actor | Omschrijving |
|---|---|
| Bezoeker | Niet-ingelogde gebruiker. Mag publieke pagina's bekijken. |
| Reiziger | Ingelogde gebruiker met rol `reiziger`. Plant reizen, beheert eigen favorieten en geschiedenis. |
| Beheerder | Ingelogde gebruiker met rol `beheerder`. Beheert het netwerk (steden en verbindingen) en ziet alle reisgeschiedenis. |
| Developer | Bouwt de applicatie (technische user stories). |
| Systeem | De Laravel-applicatie zelf. |

**Legenda**: HS = hoofdscenario, AS = alternatief/uitzonderingsscenario, AC = acceptatiecriteria.

---

## Fase 0 — MVC-basis en projectopzet (4 uur)

### UC-0.1 — Project opzetten
- **Actor**: Developer
- **Doel**: Een werkend Laravel-project met git-repository als schone basis.
- **Precondities**: PHP, Composer en MySQL zijn geïnstalleerd.
- **HS**:
  1. Developer maakt het project aan met `composer create-project laravel/laravel routeplanner-veldonia`.
  2. Developer maakt een database aan en vult `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
  3. Developer controleert de verbinding met `php artisan migrate`.
  4. Developer doet `git init`, controleert `.gitignore` en maakt de eerste commit.
- **AS-1**: Databaseverbinding faalt → controleer host, poort, gebruiker en of de databaseserver draait.
- **Postconditie**: Project draait op `php artisan serve`, code staat in git.
- **AC**:
  - [ ] `.env` correct ingesteld, databaseverbinding werkt
  - [ ] Eerste commit aanwezig, `.gitignore` sluit `/vendor`, `.env` en `/node_modules` uit

### UC-0.2 — Eerste route, controller en view
- **Actor**: Bezoeker
- **Doel**: Een homepage zien met "Welkom bij Spoorwegen Veldonia".
- **HS**:
  1. Bezoeker opent `/`.
  2. De route verwijst naar `HomeController@index`.
  3. De controller retourneert de view `home`.
  4. De view toont de welkomsttekst.
- **AC**:
  - [ ] Route → Controller → Blade-view; géén inline HTML in `routes/web.php`
  - [ ] Je kunt uitleggen welke MVC-laag welke verantwoordelijkheid heeft
- **Reflectievraag**: Welke laag bevat de gegevens, welke de presentatie en welke de coördinatie?

### UC-0.3 — Masterlayout met navigatie
- **Actor**: Bezoeker
- **Doel**: Op elke pagina dezelfde navigatiebalk zien.
- **HS**:
  1. Developer maakt `resources/views/layouts/app.blade.php` met `@yield('content')`.
  2. Bestaande views gebruiken `@extends('layouts.app')` en `@section('content')`.
  3. De layout toont navigatielinks naar Home, Steden en Login.
- **AC**:
  - [ ] Layoutbestand staat in `resources/views/layouts`
  - [ ] Links naar Home, Steden (placeholder) en Login (placeholder) werken

### UC-0.4 — Statische informatiepagina
- **Actor**: Bezoeker
- **Doel**: Een pagina "Over Veldonia" lezen.
- **HS**: Bezoeker klikt op "Over Veldonia" → route → `PageController@about` → view `about` binnen de masterlayout.
- **AC**:
  - [ ] Nieuwe route, controllermethode en view volgens hetzelfde patroon als UC-0.2
  - [ ] Gebruikt de masterlayout uit UC-0.3

---

## Fase 1 — Migraties en seeders: basisdata (4 uur)

### UC-1.1 — Migratie stations
- **Actor**: Developer
- **HS**: Developer maakt de migratie `create_stations_table` met de kolommen `code`, `name`, `region`, `population` en draait `php artisan migrate`.
- **AS-1**: Migratie faalt → `php artisan migrate:rollback`, corrigeer en draai opnieuw.
- **AC**:
  - [ ] Kolommen `code`, `name`, `region`, `population` aanwezig
  - [ ] `php artisan migrate` draait foutloos

### UC-1.2 — Seeder stations
- **Actor**: Developer
- **HS**: `StationSeeder` vult de 10 steden uit `docs/datamodel.md` §1; `php artisan db:seed` voert de seeder uit.
- **AC**:
  - [ ] De 10 steden uit de opdracht staan in de database
  - [ ] `php artisan db:seed` levert precies 10 rijen op

### UC-1.3 — Migratie connections
- **Actor**: Developer
- **HS**: Migratie `create_connections_table` met `from_station_id`, `to_station_id`, `distance_km`, `duration_minutes` en foreign keys naar `stations`.
- **AC**:
  - [ ] Foreign keys naar `stations` voor beide station-kolommen
  - [ ] Kolommen `distance_km` en `duration_minutes` aanwezig

### UC-1.4 — Seeder connections
- **Actor**: Developer
- **HS**: `ConnectionSeeder` zoekt stations op via hun `code` en maakt de 15 verbindingen uit `docs/datamodel.md` §2.
- **AS-1**: Seeder wordt opnieuw gedraaid → geen dubbele rijen (`truncate` of `firstOrCreate`).
- **AC**:
  - [ ] Alle 15 verbindingen staan erin, foreign keys kloppen
  - [ ] Seeder is idempotent te herdraaien

---

## Fase 2 — CRUD-basis (8 uur)

### UC-2.1 — Overzicht van steden
- **Actor**: Bezoeker
- **HS**: Bezoeker opent `/stations` → controller haalt `Station::all()` op → index-view toont een tabel met alle kolommen.
- **AS-1**: Geen steden in de database → nette melding "Nog geen steden".
- **AC**:
  - [ ] Index-view toont alle kolommen uit `stations`
  - [ ] Gebruikt Eloquent, geen raw SQL

### UC-2.2 — Detailpagina van een station
- **Actor**: Bezoeker
- **HS**: Bezoeker klikt in het overzicht op een stad → `/stations/{station}` → route-model-binding levert het model → detailview toont de gegevens.
- **AS-1**: Station bestaat niet → 404-pagina.
- **AC**:
  - [ ] Route gebruikt route-model-binding (`{station}`)
  - [ ] Onbekend station geeft een 404-pagina, geen 500

### UC-2.3 — Station toevoegen
- **Actor**: Beheerder
- **HS**: Beheerder opent het formulier (`create`), vult code, naam, regio en inwoners in en verstuurt (`store`); na opslaan volgt een redirect naar het overzicht.
- **AS-1**: Verplicht veld leeg of code bestaat al → formulier opnieuw tonen met foutmeldingen en ingevulde waarden.
- **AC**:
  - [ ] Server-side validatie: `required` en unieke `code`
  - [ ] Foutmeldingen worden netjes bij het formulier getoond

### UC-2.4 — Station bewerken
- **Actor**: Beheerder
- **HS**: Beheerder opent `edit` met vooraf ingevulde velden, past gegevens aan en slaat op via `update`.
- **AS-1**: Validatie faalt → terug naar formulier met foutmeldingen.
- **AC**:
  - [ ] Edit-formulier is vooraf ingevuld, update-actie valideert
  - [ ] Flash message met succesmelding na opslaan

### UC-2.5 — Station verwijderen
- **Actor**: Beheerder
- **HS**: Beheerder klikt "Verwijderen" → bevestigingsstap → `destroy` → redirect met succesmelding.
- **AS-1**: Beheerder annuleert de bevestiging → er verandert niets.
- **AS-2**: Station heeft nog verbindingen → foreign key constraint → nette foutmelding in plaats van een exception.
- **AC**:
  - [ ] Bevestigingsstap vóór verwijderen
  - [ ] Nette foutafhandeling bij bestaande verbindingen

### UC-2.6 — Overzicht van verbindingen
- **Actor**: Bezoeker
- **HS**: Bezoeker opent `/connections` → overzicht toont van-stad, naar-stad (namen) en rijtijd.
- **AC**:
  - [ ] Stadsnamen zichtbaar, geen id's
  - [ ] Relatie/join gebruikt; geen losse query per rij (N+1)

### UC-2.7 — Verbinding toevoegen
- **Actor**: Beheerder
- **HS**: Beheerder kiest van-stad en naar-stad uit dropdowns, vult afstand en rijtijd in en slaat op.
- **AS-1**: Van- en naar-stad zijn gelijk → validatiefout.
- **AC**:
  - [ ] Dropdowns met bestaande steden, geen vrij tekstveld
  - [ ] Validatie: van-stad ≠ naar-stad

### UC-2.8 — Verbinding bewerken/verwijderen
- **Actor**: Beheerder
- **HS**: Analoog aan UC-2.4 en UC-2.5, maar voor `connections`.
- **AS-1**: Verbinding heeft al trips → nette melding of cascade, bewust gekozen.
- **AC**:
  - [ ] Edit- en delete-flow werken, inclusief bevestiging en flash message

---

## Fase 3 — Eloquent-relaties (4 uur)

### UC-3.1 — Relaties tussen Station en Connection
- **Actor**: Developer
- **HS**: Developer definieert op `Station` de relaties naar vertrekkende en aankomende verbindingen, en op `Connection` de relaties `fromStation` en `toStation`.
- **AC**:
  - [ ] `hasMany`/`belongsTo` gedefinieerd tussen `Station` en `Connection`
  - [ ] Geen handmatige `where(...)`-queries meer in de controller voor deze relatie

### UC-3.2 — Verbindingen tonen via relatie
- **Actor**: Bezoeker
- **HS**: Bezoeker opent een stationsdetailpagina en ziet alle directe verbindingen met bestemming en rijtijd.
- **AS-1**: Station heeft geen verbindingen → melding "Geen directe verbindingen".
- **AC**:
  - [ ] Detailpagina (UC-2.2) gebruikt de relaties uit UC-3.1
  - [ ] N+1-probleem herkend en opgelost met `with()`
- **Reflectievraag**: Hoeveel queries draaide de pagina vóór en na `with()`?

### UC-3.3 — Model en migratie voor Trip
- **Actor**: Developer
- **HS**: Developer maakt de migratie `create_trips_table` (`connection_id`, `departure_time`, `arrival_time`) en legt de relatie `Connection hasMany Trip` vast.
- **AC**:
  - [ ] Migratie `trips` met de drie kolommen en foreign key
  - [ ] One-to-many relatie tussen `Connection` en `Trip`

### UC-3.4 — Seeder genereert trips automatisch
- **Actor**: Developer
- **HS**:
  1. `TripSeeder` loopt over alle verbindingen.
  2. Per verbinding leest de seeder de frequentie en het tijdvenster (zie `docs/datamodel.md` §2).
  3. De seeder genereert per interval een trip in beide richtingen: `departure_time` + rijtijd = `arrival_time`.
- **AS-1**: Aantal gegenereerde trips klopt niet met de frequentie → controleer de stapgrootte en het eindtijdstip.
- **AC**:
  - [ ] Seeder-loop leest frequentie/tijdvenster per verbinding
  - [ ] Aantal trips is gecontroleerd en verklaarbaar

---

## Fase 4 — Het routeplanningsalgoritme (10 uur)

### UC-4.1 — Zoekformulier
- **Actor**: Reiziger
- **HS**: Reiziger opent de planner, kiest van-stad en naar-stad uit dropdowns, vult een vertrektijd in en verstuurt het formulier via GET naar de search-route.
- **AC**:
  - [ ] Twee dropdowns met steden en een veld voor vertrektijd
  - [ ] Eenvoudige GET-request naar een search-route

### UC-4.2 — Invoer valideren
- **Actor**: Reiziger
- **HS**: Systeem valideert de invoer voordat het zoeken start.
- **AS-1**: Een station bestaat niet → foutmelding bij het veld.
- **AS-2**: Van- en naar-stad zijn gelijk → foutmelding.
- **AS-3**: Ongeldige of ontbrekende vertrektijd → foutmelding.
- **AC**:
  - [ ] Validatie: beide steden bestaan, van ≠ naar, vertrektijd is geldig
  - [ ] Foutmeldingen bij het formulier, nooit een 500-pagina

### UC-4.3 — Trips ophalen en sorteren
- **Actor**: Developer
- **HS**: Developer schrijft een Eloquent-scope die alle trips vanaf de gekozen vertrektijd oplopend op vertrektijd ophaalt, inclusief de bijbehorende connection en stations.
- **AC**:
  - [ ] Scope/query filtert op vertrektijd en sorteert oplopend
  - [ ] Eager loading van `connection` (en de stations daarvan)

### UC-4.4 — Connection Scan Algorithm implementeren
- **Actor**: Developer
- **HS**:
  1. Zet de vroegst bekende aankomsttijd van het vertrekstation op de gekozen vertrektijd, van alle andere stations op oneindig.
  2. Loop één keer lineair door de gesorteerde trips.
  3. Is een trip bereikbaar (vertrekstation al bereikt vóór het vertrek van de trip) én verbetert hij de aankomsttijd van het aankomststation, dan werk je die aankomsttijd bij.
  4. Na de scan bevat elk bereikbaar station zijn vroegst mogelijke aankomsttijd.
- **AS-1**: Bestemming blijft op oneindig → geen route (zie UC-4.8).
- **AC**:
  - [ ] Eén lineaire scan door de gesorteerde trips
  - [ ] Correct op minimaal 3 testroutes, waaronder één met verplichte overstap (bijv. Duinzicht → Zonnedal)

### UC-4.5 — Minimale overstaptijd toevoegen
- **Actor**: Reiziger
- **HS**: Het algoritme accepteert een trip alleen als je het vertrekstation minstens de minimale overstaptijd vóór vertrek hebt bereikt; blijf je in dezelfde trein zitten, dan geldt die marge niet.
- **AS-1**: Overstap valt precies binnen de marge → wordt geaccepteerd; net erbuiten → wordt afgewezen.
- **AC**:
  - [ ] Constante (bijv. 5 minuten, uit `config/veldonia.php`) verwerkt in de vergelijking
  - [ ] Randgeval getest en het resultaat verklaard

### UC-4.6 — Reisadvies tonen
- **Actor**: Reiziger
- **HS**: Na het zoeken toont de resultpagina vertrektijd, aankomsttijd, totale reisduur en het aantal overstappen.
- **AC**:
  - [ ] Alle vier gegevens zichtbaar op de resultpagina
  - [ ] Nette Blade-weergave, geen `dd()` of ruwe array-dump

### UC-4.7 — Route reconstrueren
- **Actor**: Reiziger
- **HS**: Tijdens de scan onthoudt het systeem per station via welke trip het bereikt is; daarna traceert het vanaf de bestemming terug naar het vertrekstation en draait de lijst om.
- **AC**:
  - [ ] Per station wordt de "binnenkomende" trip onthouden
  - [ ] Stap-voor-stap lijst met station, trein en vertrek-/aankomsttijd

### UC-4.8 — Geen route gevonden
- **Actor**: Reiziger
- **HS**: Is de bestemming onbereikbaar, dan toont het systeem een nette melding met een suggestie (andere vertrektijd of andere stad).
- **AS-1**: Vertrektijd ligt na sluitingstijd van het net → zelfde nette melding.
- **AC**:
  - [ ] Onbereikbaar station of te laat vertrek geeft een melding, geen foutpagina
  - [ ] Handmatig getest met een combinatie die pas na sluitingstijd bereikbaar is

### UC-4.9 — Alternatieve routes
- **Actor**: Reiziger
- **HS**: Naast de snelste reis toont het systeem minimaal één latere optie, bijvoorbeeld door opnieuw te scannen vanaf net ná het vertrek van de eerste optie.
- **AC**:
  - [ ] Algoritme levert minimaal 2 opties
  - [ ] UI toont beide opties overzichtelijk naast/onder elkaar

### UC-4.10 — Performance-optimalisatie
- **Actor**: Developer
- **HS**: Developer meet het aantal queries en de laadtijd van een zoekopdracht, voegt een index op `departure_time` toe, controleert de eager loading en meet opnieuw.
- **AC**:
  - [ ] Index op `departure_time` aanwezig, eager loading gecontroleerd (bijv. met Laravel Debugbar)
  - [ ] Vóór- en na-metingen gedocumenteerd (aantal queries, laadtijd)

---

## Fase 5 — Authenticatie (4 uur)

### UC-5.1 — Registreren en inloggen
- **Actor**: Bezoeker
- **HS**: Bezoeker registreert met naam, e-mail en wachtwoord en logt daarna in.
- **AS-1**: E-mail bestaat al of wachtwoorden komen niet overeen → validatiefout.
- **AS-2**: Onjuiste inloggegevens → foutmelding, geen sessie.
- **AC**:
  - [ ] Laravel Breeze (of Fortify) geïnstalleerd en werkend
  - [ ] Registratie- en loginformulieren functioneel met validatie

### UC-5.2 — Ingelogde status in de navigatie
- **Actor**: Reiziger
- **HS**: De navigatiebalk toont de naam of het e-mailadres van de ingelogde gebruiker plus een uitlogknop; uitloggen leidt terug naar de homepage.
- **AS-1**: Niet ingelogd → login- en registreerlinks.
- **AC**:
  - [ ] Navigatie past zich aan op de ingelogde status
  - [ ] Uitloggen werkt en redirect naar de homepage

### UC-5.3 — Routeplanner alleen voor ingelogde gebruikers
- **Actor**: Beheerder (regel), Bezoeker (ervaart)
- **HS**: De zoek- en resultaatroutes zitten in een `auth`-middlewaregroep.
- **AS-1**: Niet-ingelogde bezoeker opent de planner → redirect naar login met duidelijke melding.
- **AC**:
  - [ ] `auth`-middleware op de zoek-/resultaatroutes
  - [ ] Duidelijke melding bij de redirect

### UC-5.4 — Gebruikersrol toevoegen
- **Actor**: Developer
- **HS**: Migratie voegt een `role`-kolom toe aan `users` met standaardwaarde `reiziger`; de seeder maakt minimaal één account per rol.
- **AC**:
  - [ ] `role`-kolom met default `reiziger`
  - [ ] Testaccount per rol aanwezig en gedocumenteerd in de README

---

## Fase 6 — Persoonlijke functionaliteit (6 uur)

### UC-6.1 — Migratie favorieten
- **Actor**: Developer
- **HS**: Migratie `create_favorites_table` met `user_id`, van-station en naar-station (of een klein JSON-veld met de route); `User hasMany Favorite`.
- **AC**:
  - [ ] Kolommen `user_id`, van-station en naar-station aanwezig, met foreign keys
  - [ ] Relatie `User::hasMany(Favorite::class)` gedefinieerd

### UC-6.2 — Route opslaan als favoriet
- **Actor**: Reiziger
- **Preconditie**: Reiziger is ingelogd en heeft een reisadvies gevonden.
- **HS**: Reiziger klikt op de resultpagina op "Opslaan als favoriet" → systeem maakt een favoriet voor de ingelogde gebruiker → bevestiging.
- **AS-1**: Dezelfde favoriet bestaat al → geen duplicaat, maar hergebruik of melding.
- **AC**:
  - [ ] Knop op de resultpagina maakt een favoriet voor de ingelogde gebruiker
  - [ ] Dubbele favoriet wordt voorkomen of hergebruikt

### UC-6.3 — Overzicht eigen favorieten
- **Actor**: Reiziger
- **HS**: Reiziger opent `/favorieten` en ziet uitsluitend de eigen opgeslagen routes; elke favoriet linkt door naar een nieuwe zoekopdracht met dezelfde steden.
- **AS-1**: Nog geen favorieten → melding met link naar de planner.
- **AC**:
  - [ ] Alleen favorieten van de ingelogde gebruiker zichtbaar
  - [ ] Doorklikken start een nieuwe zoekopdracht met dezelfde steden

### UC-6.4 — Favoriet verwijderen
- **Actor**: Reiziger
- **HS**: Reiziger klikt "Verwijderen" → bevestiging → favoriet wordt verwijderd → flash message.
- **AS-1**: Reiziger annuleert → er verandert niets.
- **AS-2**: Favoriet is van een andere gebruiker → actie wordt geweigerd (autorisatie volgt in UC-7.3/7.4).
- **AC**:
  - [ ] Delete-actie met bevestiging
  - [ ] Alleen bruikbaar voor de eigenaar (functioneel getest)

### UC-6.5 — Migratie en seeder reisgeschiedenis
- **Actor**: Developer
- **HS**: Migratie `create_search_histories_table` met `user_id`, van-station, naar-station, gezochte vertrektijd en het tijdstip van zoeken; elke zoekopdracht van een ingelogde gebruiker wordt gelogd.
- **AC**:
  - [ ] Migratie met alle genoemde kolommen
  - [ ] Seeder met testdata voor demonstratiedoeleinden

### UC-6.6 — Overzicht reisgeschiedenis
- **Actor**: Reiziger
- **HS**: Reiziger opent `/geschiedenis` en ziet de eigen zoekopdrachten, nieuwste bovenaan, met paginering.
- **AS-1**: Geen geschiedenis → nette melding.
- **AC**:
  - [ ] `paginate()` gebruikt, nieuwste bovenaan
  - [ ] Alleen de eigen geschiedenis zichtbaar

---

## Fase 7 — Gates en Policies (6 uur)

### UC-7.1 — Gate voor netwerkbeheer
- **Actor**: Developer / Beheerder
- **HS**: Developer definieert een Gate (bijv. `beheer-netwerk`) die true teruggeeft voor gebruikers met de rol `beheerder`.
- **AC**:
  - [ ] Gate gedefinieerd die bepaalt wie het netwerk mag beheren
  - [ ] Je kunt uitleggen wanneer je een Gate gebruikt en wanneer een Policy
- **Reflectievraag**: Een Gate gaat over een actie zónder specifiek model, een Policy over acties óp een model — waarom past dat hier zo?

### UC-7.2 — Gate toepassen op stad/verbinding-CRUD
- **Actor**: Reiziger (wordt geweigerd), Beheerder (mag wel)
- **HS**: In de views worden create-, edit- en deleteknoppen alleen getoond aan beheerders; de routes zijn beschermd met de Gate.
- **AS-1**: Reiziger roept de URL direct aan → 403.
- **AC**:
  - [ ] Knoppen verborgen voor reizigers
  - [ ] Directe URL-aanroep als reiziger geeft 403 (regel op routeniveau afgedwongen)

### UC-7.3 — Policy voor Favorite
- **Actor**: Developer
- **HS**: Developer maakt `FavoritePolicy` met methodes voor `view`, `update` en `delete` die controleren of de gebruiker de eigenaar is.
- **AC**:
  - [ ] Policy aangemaakt voor het `Favorite`-model
  - [ ] Bekijken, bewerken en verwijderen alleen toegestaan voor de eigenaar

### UC-7.4 — Policy koppelen aan de controller
- **Actor**: Developer
- **HS**: `FavoriteController` roept in elke relevante actie de autorisatie aan (bijv. `$this->authorize(...)`).
- **AS-1**: Gebruiker A past de URL aan om een favoriet van gebruiker B te verwijderen → 403.
- **AC**:
  - [ ] Autorisatie in elke relevante controlleractie, niet alleen verborgen in de view
  - [ ] Test uitgevoerd: gebruiker A kan de favoriet van B niet verwijderen

### UC-7.5 — Policy voor reisgeschiedenis
- **Actor**: Beheerder en Reiziger
- **HS**: Een beheerder ziet alle reisgeschiedenis, een reiziger alleen de eigen rijen; de index-query past zich aan op de rol.
- **AC**:
  - [ ] Policy met rolcheck (beheerder alles, reiziger alleen eigen rijen)
  - [ ] De query zelf past zich aan, niet alleen de UI

### UC-7.6 — Autorisatie afronden en testen
- **Actor**: Developer
- **HS**: Developer maakt een 403-foutpagina in de huisstijl en loopt de testchecklist door.
- **Testchecklist (minimaal 5 scenario's)**:
  1. Reiziger opent `/stations/create` → 403
  2. Beheerder opent `/stations/create` → 200
  3. Reiziger verwijdert favoriet van een andere gebruiker → 403
  4. Reiziger opent de reisgeschiedenis → alleen eigen rijen
  5. Beheerder opent de reisgeschiedenis → alle rijen
  6. Niet-ingelogde bezoeker opent de planner → redirect naar login
- **AC**:
  - [ ] Aangepaste 403-pagina in de huisstijl
  - [ ] Minimaal 5 scenario's handmatig of met een feature-test geverifieerd

---

## Fase 8 — Afronding en oplevering (4 uur)

### UC-8.1 — UI-consistentie
- **Actor**: Bezoeker
- **HS**: Alle views gebruiken hetzelfde CSS-framework en dezelfde opbouw; de app is bruikbaar op mobiel en desktop.
- **AC**:
  - [ ] Eén framework (Bootstrap of Tailwind) consequent toegepast op alle views
  - [ ] Responsief op minimaal mobiele en desktopbreedte

### UC-8.2 — Consistente foutafhandeling
- **Actor**: Gebruiker
- **HS**: Flash messages en validatiefouten worden overal via hetzelfde herbruikbare Blade-component getoond.
- **AC**:
  - [ ] Eén herbruikbaar component voor meldingen en validatiefouten
  - [ ] Geen onafgevangen exceptions zichtbaar in de UI

### UC-8.3 — Seeders opschonen
- **Actor**: Developer
- **HS**: `DatabaseSeeder` roept alle seeders in de juiste volgorde aan: stations → connections → trips → users → search history.
- **AC**:
  - [ ] Juiste volgorde in `DatabaseSeeder`
  - [ ] Factories gebruikt waar zinvol (bijv. testgebruikers)

### UC-8.4 — Oplevering
- **Actor**: Docent
- **HS**: Docent volgt de README, zet het project op een schone omgeving op en beoordeelt de functionaliteit.
- **AC**:
  - [ ] README met installatiestappen, testaccounts (met rol) en overzicht van geïmplementeerde user stories
  - [ ] Project draait foutloos na het volgen van de README

---

## Urenoverzicht

| Fase | Onderwerp | Uren |
|---|---|---|
| 0 | MVC-basis en projectopzet | 4 |
| 1 | Migraties en seeders: basisdata | 4 |
| 2 | CRUD-basis | 8 |
| 3 | Eloquent-relaties | 4 |
| 4 | Routeplanningsalgoritme | 10 |
| 5 | Authenticatie | 4 |
| 6 | Persoonlijke functionaliteit | 6 |
| 7 | Gates en Policies | 6 |
| 8 | Afronding en oplevering | 4 |
| | **Totaal** | **50** |
