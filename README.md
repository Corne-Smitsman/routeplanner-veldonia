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

Rustig en clean, zonder opsmuk. Houd je in alle nieuwe views aan deze regels:

| Onderdeel | Afspraak |
|---|---|
| Container | `mx-auto max-w-7xl px-6` — alle pagina's dezelfde breedte en marges |
| Kleuren | Alleen het `rail`-palet uit `resources/css/app.css` (`rail-50` t/m `rail-900`) |
| Scheiding | Randen (`border-rail-200`) en vlakken, **geen** `shadow-*` |
| Typografie | Normale schrijfwijze, **geen** `uppercase` of `tracking-wide` |
| Koppen | `font-semibold text-rail-900`, tekst `text-rail-600` |
| Randen | `rounded-md` voor knoppen, `rounded-lg` voor kaders |
| Interactie | `transition-colors` bij hover, active state met een onderrand van 2px |

### Layout

| Bestand | Rol |
|---|---|
| `resources/views/layouts/app.blade.php` | Masterlayout met `@yield('content')` |
| `resources/views/partials/header.blade.php` | Sticky header met navigatie en active state |
| `resources/views/partials/footer.blade.php` | Footer |
| `resources/views/partials/logo.blade.php` | Beeldmerk (SVG), herbruikbaar via `@include` |
| `public/favicon.svg` | Favicon met hetzelfde beeldmerk |

Elke nieuwe pagina begint met `@extends('layouts.app')` en vult `@section('title')` en `@section('content')`.

## Testaccounts

Vul dit in zodra de seeder uit user story 5.4 klaar is.

| Rol | E-mail | Wachtwoord |
|---|---|---|
| beheerder | *(nog invullen)* | *(nog invullen)* |
| reiziger | *(nog invullen)* | *(nog invullen)* |

## Geïmplementeerde user stories

Zie `docs/voortgang.md`. Vink af wat af is en vermeld hier bij oplevering het eindresultaat.

## Tests

```bash
php artisan test
```
