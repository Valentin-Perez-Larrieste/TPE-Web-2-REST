# Proyecto Biblioteca Central de BS AS

## Intengrantes
- Valentin Perez Larrieste

## Consumo de la API

  ### Endpoints
  - Obtener el catálogo completo (Libros y Géneros): GET + 'catalogue'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue
  - Obtener un libro por id: GET + 'book/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/book/7
  - Obtener un género por id: GET + 'genre/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/genre/7
  - Modificar un libro: PUT + 'book/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/book/7   //Rellenar el body con los datos necesarios
  - Modificar un género: PUT + 'genre/id'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/genre/7   //Rellenar el body con los datos necesarios
  - Agregar un nuevo libro: POST + 'book'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/book   //Rellenar el body con los datos necesarios
  - Agregar un nuevo género: POST + 'genre'. Ej: http://localhost/Web-2/TPE-Web-2-REST/api/genre   //Rellenar el body con los datos necesarios

    #### Query params (Ordenado y Filtrado)
    
      ##### Ordenado
      - Ordenar libros: sortBooksBy(Para elegir el campo por el cual ordenar) - orderBooks(Para elegir ascendente o descendente) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?sortBooksBy=editorial&orderBooks=DESC
      - Ordenar géneros: sortGenresBy(Para elegir el campo por el cual ordenar) - orderGenres(Para elegir ascendente o descendente) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?sortGenresBy=id&orderGenres=ASC
      
      ##### Filtrado
      - Filtrar libros: filterBooksBy(Para elegir el campo por el cual filtrar) - valueBook(Para introducir el valor para filtrar) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?filterBooksBy=autor&valueBook=Miguel de Cervantes
      - Filtrar géneros: filterGenresBy(Para elegir el campo por el cual filtrar) - valueGenre(Para introducir el valor para filtrar) Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?filterGenresBy=nombre&valueGenre=Ciencia ficcion

      ##### Aclaración
      Los query params se pueden combinar entre sí, pudiendo ordenar y filtrar a la vez, con libros y géneros. Sólo hace falta agregar "&" después de cada uno.
      Ej: http://localhost/Web-2/TPE-Web-2-REST/api/catalogue?filterBooksBy=ID_genero&valueBook=11&sortBooksBy=genero&orderBooks=DESC&sortGenresBy=id&orderGenres=DESC
