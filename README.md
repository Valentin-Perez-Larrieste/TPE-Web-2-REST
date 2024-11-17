# Proyecto Biblioteca Central de BS AS

## Intengrantes
- Valentin Perez Larrieste

## Consumo de la API

  ### Endpoints
  - <ins>Obtener el catálogo completo (Libros y Géneros):</ins> GET + 'catalogue'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue
  - <ins>Obtener un libro por id:</ins> GET + 'book/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/book/7
  - <ins>Obtener un género por id:</ins> GET + 'genre/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/genre/7
  - <ins>Modificar un libro:</ins> PUT + 'book/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/book/7   //Rellenar el body con los datos necesarios
  - <ins>Modificar un género:</ins> PUT + 'genre/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/genre/7   //Rellenar el body con los datos necesarios
  - <ins>Agregar un nuevo libro:</ins> POST + 'book'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/book   //Rellenar el body con los datos necesarios
  - <ins>Agregar un nuevo género:</ins> POST + 'genre'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/genre   //Rellenar el body con los datos necesarios

    #### Query params (Ordenado y Filtrado)
    
      ##### Ordenado
      - <ins>Ordenar libros:</ins> sortBooksBy(Para elegir el campo por el cual ordenar) - orderBooks(Para elegir ascendente o descendente) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?sortBooksBy=editorial&orderBooks=DESC
      - <ins>Ordenar géneros:</ins> sortGenresBy(Para elegir el campo por el cual ordenar) - orderGenres(Para elegir ascendente o descendente) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?sortGenresBy=id&orderGenres=ASC
      
      ##### Filtrado
      - <ins>Filtrar libros:</ins> filterBooksBy(Para elegir el campo por el cual filtrar) - valueBook(Para introducir el valor para filtrar) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?filterBooksBy=autor&valueBook=Miguel de Cervantes
      - <ins>Filtrar géneros:</ins> filterGenresBy(Para elegir el campo por el cual filtrar) - valueGenre(Para introducir el valor para filtrar) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?filterGenresBy=nombre&valueGenre=Ciencia ficcion

      ##### Aclaración
      Los query params se pueden combinar entre sí, pudiendo ordenar y filtrar a la vez, con libros y géneros. Sólo hace falta agregar "&" después de cada uno.
      Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?filterBooksBy=ID_genero&valueBook=11&sortBooksBy=genero&orderBooks=DESC&sortGenresBy=id&orderGenres=DESC
