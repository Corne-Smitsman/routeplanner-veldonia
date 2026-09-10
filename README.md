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
