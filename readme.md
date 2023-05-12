## SHOPPING LIST
----------------

Maak een shopping list op basis van volgend model:
- id
- name
- status (0,1)

De "homepagina" toont een overzicht van alles items met status 0.
Elke item heeft een knop (mark as completed).
Onder het overzicht is een textfield met button om extra items toe te voegen.


## BLOG API
-----------

Maak volgende endpoints:

- GET /blog-posts
- POST /blog-posts
- GET /blog-posts/{id}
- DELETE /blog-posts/{id}
- PATCH /blog-posts/{id}

Op basis van volgende model:
- id
- timestamps
- title
- body
- published (0,1)


## ROAD RAGE (NUMMERPLATEN MESSAGE BOARD)
-----------------------------------------

Maak een online message board waarop gebruikers een bericht kunnen posten, gericht aan een auto (nummerplaat). Gebruik hiervoor Breeze (en Sanctum).

De applicatie bestaat uit 2 onderdelen:
1. Back-end: registeren en inloggen (mbv Breeze), waarna de gebruiker een pagina te zien krijgt waarop nieuwe _entries_ toegevoegd kunnen worden en waaronder alle *eigen* entries getoond worden. De eigen entries kunnen bewerkt en verwijderd worden. Indien er heel veel eigen entries zijn, worden 20 entries getoond en verschijnt paginering onderaan de pagina. Een entry bestaat uit een nummerplaat, een boodschap, een author (+ de standaard id en timestamp velden)
2. Front-end: een API (GET-endpoints) die toelaat om entries op te vragen (meest recente eerst) en die toelaat om te filteren op basis van nummerplaat

####Extra: 
- verwijder de landingspagina van de back-end leeg en toon login form of meteen dashboard.
- maak gebruik van een Seeder om dummy data aan te maken
- zorg ervoor dat de entries geen auto-incremental id hebben, maar een UUID


Zie https://bootcamp.laravel.com/ voor herhaling + eventueel https://www.youtube.com/watch?v=XVxyY_owL_M