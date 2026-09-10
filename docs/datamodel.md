# Datamodel en seed-data — Veldonia

## 1. Steden (`stations`)

Kolommen: `id`, `code`, `name`, `region`, `population`, `created_at`, `updated_at`.

| Code | Naam | Regio | Inwoners |
|---|---|---|---|
| VLB | Velburg | Centraal (hoofdstad) | 480.000 |
| NRW | Noorderwijk | Noord | 210.000 |
| ZDB | Zuiderburcht | Zuid | 190.000 |
| OHV | Oosthaven | Oost (havenstad) | 260.000 |
| WDP | Westdorp | West | 95.000 |
| DZT | Duinzicht | Noordwest (kust) | 70.000 |
| BGR | Bergenrode | Noordoost (heuvels) | 60.000 |
| MHV | Meerhoven | Zuid-centraal (meer) | 130.000 |
| RVB | Rivierbeek | Zuidoost (rivierdal) | 85.000 |
| ZDL | Zonnedal | Zuid | 100.000 |

## 2. Rechtstreekse verbindingen (`connections`)

Kolommen: `id`, `from_station_id`, `to_station_id`, `distance_km`, `duration_minutes`, `created_at`, `updated_at`.
Elke rij is in beide richtingen te berijden. De rijtijd is de zuivere rijtijd zonder overstap.

| Van | Naar | Afstand (km) | Rijtijd (min) | Frequentie |
|---|---|---|---|---|
| Velburg | Noorderwijk | 45 | 28 | elke 30 min, 06:00–23:00 |
| Velburg | Zuiderburcht | 60 | 35 | elke 30 min, 06:00–23:00 |
| Velburg | Oosthaven | 80 | 50 | elke 30 min, 06:00–23:00 |
| Velburg | Westdorp | 55 | 33 | elke 60 min, 06:00–22:00 |
| Velburg | Meerhoven | 40 | 25 | elke 30 min, 06:00–23:00 |
| Noorderwijk | Duinzicht | 30 | 20 | elke 60 min, 06:00–22:00 |
| Noorderwijk | Bergenrode | 50 | 34 | elke 60 min, 06:00–22:00 |
| Westdorp | Duinzicht | 35 | 22 | elke 60 min, 06:00–22:00 |
| Zuiderburcht | Meerhoven | 25 | 18 | elke 30 min, 06:00–23:00 |
| Zuiderburcht | Zonnedal | 40 | 27 | elke 60 min, 06:00–22:00 |
| Zuiderburcht | Rivierbeek | 45 | 30 | elke 60 min, 06:00–22:00 |
| Oosthaven | Rivierbeek | 35 | 24 | elke 60 min, 06:00–22:00 |
| Oosthaven | Bergenrode | 70 | 45 | elke 120 min, 07:00–21:00 |
| Meerhoven | Zonnedal | 30 | 20 | elke 30 min, 06:00–23:00 |
| Rivierbeek | Zonnedal | 50 | 33 | elke 60 min, 06:00–22:00 |

**Let op**: Velburg is de hub (graad 5). Duinzicht–Zonnedal heeft géén rechtstreekse trein en
vereist minimaal twee overstappen. Precies daarom is in fase 4 een echt algoritme nodig
en niet één enkele query.

## 3. Van verbinding naar concrete treinen (`trips`)

`connections` beschrijft de lijn, niet de individuele trein. In fase 3 genereer je met een
seeder-loop op basis van de frequentiekolom hierboven concrete vertrek- en aankomsttijden:
bijvoorbeeld iedere 30 minuten tussen 06:00 en 23:00 een rij in `trips` met
`connection_id`, `departure_time` en `arrival_time`.

## 4. Globaal datamodel (richtinggevend)

| Tabel | Betekenis |
|---|---|
| `stations` | De 10 steden van Veldonia |
| `connections` | Rechtstreekse spoorlijnen tussen twee stations |
| `trips` | Concrete vertrekken op een connection (tijdstip-specifiek) |
| `users` | Gebruikers met een rol (`reiziger` / `beheerder`) |
| `favorites` | Opgeslagen routes per gebruiker |
| `search_histories` | Gelogde zoekopdrachten per gebruiker |

### Relaties

```
Station 1 ──< Connection >── 1 Station      (from_station_id / to_station_id)
Connection 1 ──< Trip
User 1 ──< Favorite
User 1 ──< SearchHistory
```
