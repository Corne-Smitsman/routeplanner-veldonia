<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes — Routeplanner Veldonia
|--------------------------------------------------------------------------
| Registreer je routes hieronder per fase. Geen inline HTML of logica in dit
| bestand (user story 0.2): een route wijst altijd naar een controllermethode.
*/

// Tijdelijke placeholder — verwijderen zodra user story 0.2 klaar is.
Route::view('/', 'welcome');

/*
| FASE 0 — MVC-basis
| TODO 0.2  GET  /                 -> HomeController@index          (name: home)
| TODO 0.4  GET  /over-veldonia    -> PageController@about          (name: about)
|
| FASE 2 — CRUD steden en verbindingen
| TODO 2.1  GET  /stations                 -> StationController@index
| TODO 2.2  GET  /stations/{station}       -> StationController@show   (route-model-binding)
| TODO 2.3  GET  /stations/create          -> StationController@create
| TODO 2.3  POST /stations                 -> StationController@store
| TODO 2.4  GET  /stations/{station}/edit  -> StationController@edit
| TODO 2.4  PUT  /stations/{station}       -> StationController@update
| TODO 2.5  DELETE /stations/{station}     -> StationController@destroy
|           (tip: Route::resource('stations', StationController::class))
| TODO 2.6–2.8  idem voor ConnectionController
|
| FASE 4 — Routeplanner
| TODO 4.1  GET  /planner          -> RoutePlannerController@index    (zoekformulier)
| TODO 4.2  GET  /planner/zoeken   -> RoutePlannerController@search   (resultaten)
|
| FASE 5 — Authenticatie
| TODO 5.1  Breeze installeert zelf de auth-routes (routes/auth.php)
| TODO 5.3  Plaats de planner-routes in een ->middleware('auth') groep
|
| FASE 6 — Persoonlijke functionaliteit
| TODO 6.2  POST   /favorieten             -> FavoriteController@store
| TODO 6.3  GET    /favorieten             -> FavoriteController@index
| TODO 6.4  DELETE /favorieten/{favorite}  -> FavoriteController@destroy
| TODO 6.6  GET    /geschiedenis           -> SearchHistoryController@index
|
| FASE 7 — Gates & Policies
| TODO 7.2  Bescherm de beheerroutes met ->middleware('can:beheer-netwerk')
| TODO 7.4  Autoriseer favorieten via de FavoritePolicy in de controller
*/
