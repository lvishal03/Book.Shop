    <?php
    // include '../admin/conn.php';
    // $sql = "SELECT * FROM `add_book` LIMIT 6";
    // $result = mysqli_query($conn, $sql);
    ?>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--<title>Responsive Card Slider</title>-->

      <!-- Swiper CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">



      <!-- CSS -->
      <link rel="stylesheet" href="css/style.css">
      <style>
        /* Google Fonts - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        /* *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #EFEFEF;
} */
        /* .slide-container {
          max-width: 3000px;
          width: 100%; */
          /* padding: 40px 0; */
       /* }

        .slide-content {
          margin: 0 40px;
          overflow: hidden;
          border-radius: 25px;
        }

        .card {
          border-radius: 25px;
          background-color: #FFF;
        }

        .image-content,
        .card-content {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 10px 14px;
        }

        .image-content {
          position: relative;
          row-gap: 5px;
          padding: 25px 0;
        }

        .overlay {
          position: absolute;
          left: 0;
          top: 0;
          height: 100%;
          width: 100%;*/
          /* background-color: #4070F4; */
          /* border-radius: 25px 25px 0 25px; */
        /* } */

        /* .overlay::before,
        .overlay::after {
          content: '';
          position: absolute;
          right: 0;
          bottom: 40px; */
          /* height: 40px; */
          /* width: 40px; */
          /* background-color: #4070F4; */
        /* }

        .overlay::after {
          border-radius: 0 25px 0 0;
          background-color: #FFF;
        }

        .card-image {
          position: relative;
          height: 300px;
          width: 200px;
          border-radius: 50%; */
          /* background: #FFF; */
          /* padding: 3px;
        }

        .card-image .card-img {
          height: 100%;
          width: 100%;
          object-fit: cover; */
          /* border-radius: 50%; */
          /* border: 4px solid #4070F4; */
        /* } */

        /* .name {
          font-size: 18px;
          font-weight: 500; */
          /* color: #333; */
        /* } */

        /* .description {
          font-size: 14px; */
          /* color: #707070; */
       /*   text-align: center;
        }

        .button:hover {
          background: #265DF2;
        }

        .swiper-navBtn {
          color: #6E93f7;
          transition: color 0.3s ease;
        }

        .swiper-navBtn:hover {
          color: #4070F4;
        }

        .swiper-navBtn::before,
        .swiper-navBtn::after {
          font-size: 38px;
        }

        .swiper-button-next {
          right: 0;
        }

        .swiper-button-prev {
          left: 0;
        }

        .swiper-pagination-bullet {
          background-color: #6E93f7;
          opacity: 1;
        }

        .swiper-pagination-bullet-active {
          background-color: #4070F4;
        }

        @media screen and (max-width: 768px) {
          .slide-content {
            margin: 0 10px;
          }

          .swiper-navBtn {
            display: none;
          }
        }
          */
 
          
      </style>

    </head>

    <body>
    

      <!-- <div class="container-filud">
        <div class="row">
          <div class="col-md-12">
            <div class="slide-container swiper">
              <div class="slide-content">
                <div class="card-wrapper swiper-wrapper"> -->
                  <?php
                  // if ($result->num_rows > 0) {
                  //   while ($data = $result->fetch_assoc()) {
                  ?>

                      <!-- <div class="card swiper-slide">
                        <div class="image-content">
                          <span class="overlay"></span>

                          <div class="card-image">
                            <img src="" alt="" class="card-img">
                          </div>
                        </div>

                        <div class="card-content">
                          <h2 class="name">book name
                          </h2>
                          <p class="description">write name</p>


                        </div>
                      </div> -->
                  <?php
                  //   }
                  // }
                  ?>

                <!-- </div>
              </div>

              <div class="swiper-button-next swiper-navBtn"></div>
              <div class="swiper-button-prev swiper-navBtn"></div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div> -->

    </body>

    <!-- Swiper JS -->
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <!--Uncomment this line-->
   <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
    <script>
  /* var swiper = new Swiper(".slide-content", {
        slidesPerView: 6,
        spaceBetween: 30,
        loop: true,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          dynamicBullets: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          520: {
            slidesPerView: 2,
          },
          520: {
            slidesPerView: 3,
          },
          520: {
            slidesPerView: 4,
          },
          520: {
            slidesPerView: 5,
          },
          520: {
            slidesPerView: 6,
          },
        },
      });*/
    </script>

    </html>

    </body>

    </html>