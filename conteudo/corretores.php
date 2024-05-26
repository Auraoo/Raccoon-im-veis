  <style>
        .info-container {
            display: flex;
            align-items: center;
        }
        .info-container img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .info-container .info {
            padding-left: 15px;
        }

    swiper-container {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  

  </style>



    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30">
    <?php include 'ADM_CRUD/corretores_mostrar.php' ?>
    </swiper-container>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
  <script>
    function updateSlidesPerView() {
        const swiperContainer = document.querySelector('.mySwiper');
        if (window.innerWidth >= 1024) {
            swiperContainer.setAttribute('slides-per-view', '3');
        } else if (window.innerWidth >= 814) {
            swiperContainer.setAttribute('slides-per-view', '2');
        } else {
            swiperContainer.setAttribute('slides-per-view', '2');
        }
    }

    // Update slides-per-view on page load
    document.addEventListener('DOMContentLoaded', function () {
        updateSlidesPerView();
        
        // Initialize Swiper after setting slides-per-view
        const swiper = new Swiper('.mySwiper', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            spaceBetween: 30,
            slidesPerView: parseInt(document.querySelector('.mySwiper').getAttribute('slides-per-view')),
        });
    });

    // Update slides-per-view on window resize
    window.addEventListener('resize', updateSlidesPerView);
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>