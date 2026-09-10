# Routeplanner Veldonia

Laravel-routeplanner voor het fictieve land Veldonia (10 steden, spoornetwerk met overstappen).
Opdracht Software Development 3 — 50 lesuren.

## Documentatie

| Bestand | Inhoud |
|---|---|
| `docs/use-cases.md` | Alle use cases per fase, met scenario's en acceptatiecriteria |
| `docs/datamodel.md` | Steden, verbindingen, frequenties en het globale datamodel |
| `docs/voortgang.md` | Checklist om je voortgang per user story bij te houden |

## Installatie

```bash
git clone <repository-url> routeplanner-veldonia
cd routeplanner-veldonia
composer install
cp .env.example .env
php artisan key:generate
```

Maak de database aan en zet de gegevens in `.env`:

```sql
CREATE DATABASE routeplanner_veldonia CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=routeplanner_veldonia
DB_USERNAME=root
DB_PASSWORD=root
```

Daarna:

```bash
php artisan migrate --seed
npm run build
php artisan serve --port=8001
```

De seeders vullen tien steden, vijftien verbindingen en het account uit `.env`.
Ze zijn idempotent: opnieuw draaien levert geen dubbele rijen op.

De app draait op http://127.0.0.1:8001

## Frontend

Dit project gebruikt **Tailwind CSS 4** via Vite (user story 8.1: één framework, consequent toegepast).

```bash
npm install
npm run dev     # tijdens het ontwikkelen (hot reload)
npm run build   # voor oplevering
```

Elke view laadt de stylesheet met `@vite('resources/css/app.css')`.
Vanaf user story 0.3 gebeurt dat één keer centraal in de masterlayout.

### Taal

De applicatie staat op `APP_LOCALE=nl`. De Nederlandse teksten voor validatie,
inloggen en paginering staan in `lang/nl/`.

### Huisstijl

Rustig en clean, zonder opsmuk. Alle kleuren staan als eigen term in `resources/css/app.css`
en worden in Tailwind gebruikt als `bg-primary`, `text-ink`, `border-line`, enzovoort.

| Term | Waarde | Gebruik |
|---|---|---|
| `primary` (+ `50`–`900`) | `#0f3d91` | Blauw accent: knoppen, links, active state |
| `secondary` (+ `50`–`900`) | `#111318` | Zwart: merkbalk, donkere vlakken |
| `danger` (+ `50`–`700`) | `#b3261e` | Alleen voor foutmeldingen en verwijderacties |
| `surface` / `surface-muted` | `#ffffff` / `#f6f7f8` | Paginavlakken |
| `line` / `line-strong` / `line-dark` | `#e2e5e9` / `#c4c9d0` / `#2f333a` | Randen en scheidingslijnen |
| `ink` / `ink-muted` / `ink-soft` | `#111318` / `#454a52` / `#878d97` | Tekst: normaal, gedempt, subtiel |
| `ink-inverse` | `#ffffff` | Tekst op donkere achtergrond |

De huisstijl is zwart, wit en blauw. Rood komt alleen voor als foutkleur.

Overige afspraken:

| Onderdeel | Afspraak |
|---|---|
| Container | `mx-auto max-w-7xl px-4 sm:px-6` |
| Scheiding | De pagina is `surface-muted`, vlakken erop zijn `surface` met een rand; **geen** `shadow-*` |
| Typografie | Normale schrijfwijze, **geen** `uppercase` |
| Randen | `rounded-lg` voor knoppen en velden, `rounded-xl` voor panelen |
| Interactie | `transition-colors` bij hover, active state met een onderrand van 2px |

### Layout

| Bestand | Rol |
|---|---|
| `resources/views/layouts/app.blade.php` | Masterlayout voor ingelogde gebruikers |
| `resources/views/layouts/guest.blade.php` | Layout voor inloggen en registreren |
| `resources/views/welcome.blade.php` | Welkomstscherm (enige publieke pagina) |
| `resources/views/partials/header.blade.php` | Sticky header met navigatie en active state |
| `resources/views/partials/footer.blade.php` | Footer |
| `resources/brand/` | Bronbestanden van het logo |
| `public/images/` | Logo en netwerkkaart als PNG (met `@2x`-varianten) |
| `resources/views/components/breadcrumbs.blade.php` | Kruimelpad, aangeroepen met een array van labels en urls |

Elke nieuwe pagina begint met `@extends('layouts.app')` en vult `@section('title')` en `@section('content')`.

## Toegang

Het welkomstscherm op `/` is de enige pagina die zonder account te bereiken is. Al het
overige zit achter de `auth`-middleware; wie niet is ingelogd komt op het inlogscherm uit.

## Testaccounts

Vul dit in zodra de seeder uit user story 5.4 klaar is.

| E-mail | Wachtwoord |
|---|---|
| corne@innovaware.nl | uit `ADMIN_PASSWORD` in `.env` |

De `UserSeeder` maakt dit account aan op basis van `ADMIN_NAME`, `ADMIN_EMAIL` en
`ADMIN_PASSWORD` uit `.env`. Zonder `ADMIN_PASSWORD` slaat de seeder het account over.
Rollen (reiziger en beheerder) volgen in een latere fase.

## Geïmplementeerde user stories

Zie `docs/voortgang.md`. Vink af wat af is en vermeld hier bij oplevering het eindresultaat.

## Tests

```bash
php artisan test
```
