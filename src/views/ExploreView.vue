<template>
  <div class="navBar">
    <ul>
      <li><a href="#ep">0m
          <div class="drop"></div>
        </a>
      </li>
      <li><a href="#me">200m
          <div class="drop"></div>
        </a>
      </li>
      <li><a href="#ba">1000m
          <div class="drop"></div>
        </a>
      </li>
      <li><a href="#ab">4000m
          <div class="drop"></div>
        </a>
      </li>
      <li><a href="#ha">6000m
          <div class="drop"></div>
        </a>
      </li>
    </ul>
    <div class="line"></div>
  </div>
  <div class="explore">

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
      <div class="bathypelagic" id="ba">
        <h1 data="1000m">1000m</h1>
      </div>
      <!-- 深淵層海洋帶 -->
      <div class="Abyssopelagic" id="ab">
        <h1 data="4000m">4000m</h1>
      </div>
      <!-- 超深淵層海洋帶 -->
      <div class="Hadopelagic" id="ha">
        <h1 data="6000m">6000m</h1>
      </div>
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

.navBar {
  position: fixed;
  top: 50%;
  right: 40px;
  text-align: right;

  ul {
    position: relative;
  }

  li {
    padding: 10px 0px;
    // border: 1px solid red;

    a {
      color: map-get($colors, light);
      padding: 0 10px;
    }

    .drop {
      display: inline-block;
      width: 15px;
      height: 15px;
      border: 3px solid #0b2f4a;
      border-radius: 50%;
      background-color: #93B7CD;
      border-top-right-radius: 0;
      transform: rotate(-45deg);
      margin-bottom: -5px;
    }
  }

  ul::after {
    content: "";
    border: 1px solid #0b2f4a;
    position: absolute;
    height: 85%;
    top: 12px;
    right: 17px;
    z-index: -1;
  }

}

.explore {
  width: 100%;
  background-image: linear-gradient(to bottom, #ECF0F3, #93B7CD, #285f9d, #114466, #0b2f4a);

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



  .wapper {
    margin: auto;
    text-align: center;

    .epipelagic {
      background-image: url(../../public/all_images/animal/sea4.png);
      width: 100%;
      background-size: cover;
      background-position: top center;

      .turtle {
        cursor: pointer;
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
        cursor: pointer;
        width: 180px;
        margin: 100px 350px -80px auto;

        img {
          visibility: top;
          width: 180px;
        }

        h4 {
          margin-left: 70px;
          margin-top: 10px;
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
          margin-top: -30px;
        }
      }


    }
  }

}
</style>