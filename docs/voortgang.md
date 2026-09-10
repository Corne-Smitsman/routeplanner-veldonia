# Voortgang — Routeplanner Veldonia

Vink af wat af is en getoetst is aan de acceptatiecriteria in `docs/use-cases.md`.

## Fase 0 — MVC-basis en projectopzet (4 uur)
- [ ] 0.1 Project opzetten
- [ ] 0.2 Eerste route, controller en view
- [ ] 0.3 Masterlayout met navigatie
- [ ] 0.4 Statische informatiepagina

## Fase 1 — Migraties en seeders (4 uur)
- [ ] 1.1 Migratie stations
- [ ] 1.2 Seeder stations
- [ ] 1.3 Migratie connections
- [ ] 1.4 Seeder connections

## Fase 2 — CRUD-basis (8 uur)
- [ ] 2.1 Overzicht van steden
- [ ] 2.2 Detailpagina van een station
- [ ] 2.3 Station toevoegen
- [ ] 2.4 Station bewerken
- [ ] 2.5 Station verwijderen
- [ ] 2.6 Overzicht van verbindingen
- [ ] 2.7 Verbinding toevoegen
- [ ] 2.8 Verbinding bewerken/verwijderen

## Fase 3 — Eloquent-relaties (4 uur)
- [ ] 3.1 Relaties tussen Station en Connection
- [ ] 3.2 Verbindingen tonen via relatie
- [ ] 3.3 Model en migratie voor Trip
- [ ] 3.4 Seeder genereert trips automatisch

## Fase 4 — Routeplanningsalgoritme (10 uur)
- [ ] 4.1 Zoekformulier
- [ ] 4.2 Invoer valideren
- [ ] 4.3 Trips ophalen en sorteren
- [ ] 4.4 Connection Scan Algorithm implementeren
- [ ] 4.5 Minimale overstaptijd toevoegen
- [ ] 4.6 Reisadvies tonen
- [ ] 4.7 Route reconstrueren
- [ ] 4.8 Geen route gevonden
- [ ] 4.9 Alternatieve routes
- [ ] 4.10 Performance-optimalisatie

## Fase 5 — Authenticatie (4 uur)
- [ ] 5.1 Registreren en inloggen
- [ ] 5.2 Ingelogde status in de navigatie
- [ ] 5.3 Routeplanner alleen voor ingelogde gebruikers
- [ ] 5.4 Gebruikersrol toevoegen

## Fase 6 — Persoonlijke functionaliteit (6 uur)
- [ ] 6.1 Migratie favorieten
- [ ] 6.2 Route opslaan als favoriet
- [ ] 6.3 Overzicht eigen favorieten
- [ ] 6.4 Favoriet verwijderen
- [ ] 6.5 Migratie en seeder reisgeschiedenis
- [ ] 6.6 Overzicht reisgeschiedenis

## Fase 7 — Gates en Policies (6 uur)
- [ ] 7.1 Gate voor netwerkbeheer
- [ ] 7.2 Gate toepassen op stad/verbinding-CRUD
- [ ] 7.3 Policy voor Favorite
- [ ] 7.4 Policy koppelen aan de controller
- [ ] 7.5 Policy voor reisgeschiedenis
- [ ] 7.6 Autorisatie afronden en testen

## Fase 8 — Afronding en oplevering (4 uur)
- [ ] 8.1 UI-consistentie
- [ ] 8.2 Consistente foutafhandeling
- [ ] 8.3 Seeders opschonen
- [ ] 8.4 Oplevering
