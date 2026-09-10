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
php artisan serve --port=8001
```

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

### Huisstijl

Rustig en clean, zonder opsmuk. Alle kleuren staan als eigen term in `resources/css/app.css`
en worden in Tailwind gebruikt als `bg-primary`, `text-ink`, `border-line`, enzovoort.

| Term | Waarde | Gebruik |
|---|---|---|
| `primary` (+ `50`–`900`) | `#12324f` | Merkkleur: koptekstbalk, accenten |
| `secondary` (+ `50`–`700`) | `#a63a2e` | Actieknoppen, active state, waarschuwingen |
| `surface` | `#ffffff` | Standaard paginavlak |
| `surface-muted` | `#f3f7fa` | Rustig vlak, paginakoppen |
| `surface-dark` | `#16385a` | Vlak op donkere achtergrond |
| `line` / `line-strong` | `#c6dae8` / `#9dbdd6` | Randen en scheidingslijnen |
| `line-dark` | `#1c4468` | Rand op donkere achtergrond |
| `ink` / `ink-muted` / `ink-soft` | `#12324f` / `#345d82` / `#6b98bb` | Tekst: normaal, gedempt, subtiel |
| `ink-inverse` | `#ffffff` | Tekst op donkere achtergrond |

Overige afspraken:

| Onderdeel | Afspraak |
|---|---|
| Container | `mx-auto max-w-7xl px-4 sm:px-6` |
| Scheiding | Randen en vlakken, **geen** `shadow-*` |
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

Elke nieuwe pagina begint met `@extends('layouts.app')` en vult `@section('title')` en `@section('content')`.

## Toegang

Het welkomstscherm op `/` is de enige pagina die zonder account te bereiken is. Al het
overige zit achter de `auth`-middleware; wie niet is ingelogd komt op het inlogscherm uit.

## Testaccounts

Vul dit in zodra de seeder uit user story 5.4 klaar is.

| Rol | E-mail | Wachtwoord |
|---|---|---|
| — | test@veldonia.nl | wachtwoord |

Rollen (reiziger en beheerder) volgen in een latere fase.

## Geïmplementeerde user stories

Zie `docs/voortgang.md`. Vink af wat af is en vermeld hier bij oplevering het eindresultaat.

## Tests

```bash
php artisan test
```
