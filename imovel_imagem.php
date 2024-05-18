<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Image Gallery</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700;900&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  min-height: 100dvh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Poppins';
}
img {
  max-width: 100%;
}
.gallery-wrapper{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;

    & .header{
        width: min(100vw, 1440px);
        padding-inline: 2rem;
    }
}

.gallery {
  width: min(100vw, 1440px);
  display: flex;
  flex-direction: column;
  padding-inline: 2rem;
  padding-block: 1rem;
  row-gap: 1rem;

  & .image-container {
    flex: 1;
    width: 100%;
    height: 550px;
    transition: flex 0.5s ease-in;

    @media only screen and (width > 480px) {
      &:hover {
        flex: 5;
      }
    }

    & .image {
      height: 100%;
      width: 100%;
      object-fit: cover;
      object-position: center;
    }
  }

  @media screen and (width > 480px) {
    flex-direction: row;

    & .image-container {
      width: calc(100% / 5);
    }
  }
}
  </style>
  <body>
    <div class="gallery-wrapper">
      <h1 class="header">Image Gallery</h1>
      <div class="gallery">
        <figure class="image-container">
          <img src="./images/img-1.jpg" alt="Image 01" class="image" />
        </figure>
        <figure class="image-container">
          <img src="./images/img-2.jpg" alt="Image 02" class="image" />
        </figure>
        <figure class="image-container">
          <img src="./images/img-3.jpg" alt="Image 03" class="image" />
        </figure>
        <figure class="image-container">
          <img src="./images/img-4.jpg" alt="Image 04" class="image" />
        </figure>
        <figure class="image-container">
          <img src="./images/img-5.jpg" alt="Image 05" class="image" />
        </figure>
      </div>
    </div>
  </body>
</html>
