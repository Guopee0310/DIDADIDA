<template>
  <div class="explore">
    <div class="navBar">
      <ul>
        <li><a href="#ep">0m</a></li>
        <li><a href="#me">200m</a></li>
        <li><a href="">1000m</a></li>
        <li><a href="">4000m</a></li>
        <li><a href="">6000m</a></li>
        <li><a href="">11000m</a></li>
      </ul>
    </div>
    <div class="wapper">

      <!-- 表層海洋帶 -->
      <div class="epipelagic" id="ep">
        <h1 data="0m">0m</h1>
        <div class="goldfish">
          <img src="../../public/all_images/animal/goldfish.png" alt="goldfish">
          <h4>黃金魚</h4>
        </div>
        <div class="turtle">
          <img src="../../public/all_images/animal/turtle.png" alt="turtle">
          <h4>綠海龜</h4>
        </div>
      </div>

      <!-- 中層海洋帶 -->
      <div class="Mesopelagic" id="me">
        <h1 data="200m">200m</h1>
        <div class="whale">
          <img src="../../public/all_images/animal/whale.png" alt="">
          <h4>鯨魚</h4>
        </div>


      </div>
      <!-- 深層海洋帶 -->

      <h1 data="1000m">1000m</h1>
      <!-- 深淵層海洋帶 -->
      <h1 data="4000m">4000m</h1>
      <!-- 超深淵層海洋帶 -->
      <h1 data="6000m">6000m</h1>
      <!-- 超深淵層海洋帶以下 -->
      <h1 data="11000m">11000m</h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {

    }
  }
}
</script>

<style lang="scss">
.header {
  background-color: #ECF0F3;
}

.explore {
  h1 {
    font-size: 75px;
    // font-size: map-get($fontSizes , h3);
    color: map-get($colors, light);
    font-family: Helvetica, Arial, sans-serif, 'Lucida Sans Regular', Geneva;
    font-weight: 800;
    color: transparent;
    -webkit-text-stroke: 3px #eee;
  }

  h4 {
    font-size: map-get($fontSizes, h4);
    color: map-get($colors , light);
  }


  width: 100%;
  background-image: linear-gradient(to bottom, #ECF0F3, #93B7CD, #285f9d, #114466, #0b2f4a);


  .wapper {
    margin: auto;
    text-align: center;

    .epipelagic {
      background-image: url(../../public/all_images/animal/sea3.png);
      width: 100%;
      background-size: cover;
      background-position: center;

      .turtle {
        width: 450px;
        margin: 150px 0 0 250px;

        img {
          visibility: top;
          width: 450px;
        }

        h4 {
          margin-right: 200px;
        }
      }

      .goldfish {
        width: 180px;
        margin: 100px 350px -80px auto;

        img {
          visibility: top;
          width: 180px;
        }

        h4 {
          margin-left: 70px;
        }
      }

    }

    .Mesopelagic {
      .whale {
        width: 700px;
        margin: 30px 150px 0 auto;

        img {
          visibility: top;
          width: 700px;
        }

        h4 {
          margin-right: 130px;
          margin-top: -100px;
        }
      }


    }
  }

}
</style>