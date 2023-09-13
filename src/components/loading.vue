<template>
  <div class="loading_animation">
    <div class="drop-container">
      <div class="drop"></div>
      <div class="logo_name">
        <p>DIDADIDA</p>
        <span></span>
        <h3>AQUARIUM</h3>
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
.loading_animation {
  position: fixed;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  top: 0;
  background-color: rgb(25, 35, 125);

  .drop-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 150px;
    width: 150px;

    .drop {
      position: absolute;
      top: -100%;
      width: 100%;
      height: 100%;
      border-radius: 100%;
      transform: rotate(-45deg);
      border: 2px solid #fff;
      animation: drip 1.8s forwards;
    }
  }
}

.logo_name {
  position: relative;
  margin-top: 10rem;
  letter-spacing: 5px;
  font-size: map-get($fontSizes, "h4");
  color: #fff;

  p {
    position: absolute;
    inset: 0;
    margin: auto;
    text-align: center;
    opacity: 0;
    animation: appear 1.6s 2s forwards;
  }

  span {
    background-color: #fff;
    width: 150px;
    height: 1.2px;
    position: absolute;
    top: 40px;
    opacity: 0;
    animation: appear 1.6s 2.2s forwards;
  }

  h3 {
    position: absolute;
    top: 50px;
    opacity: 0;
    animation: appear 1.6s 2s forwards;
  }
}

@keyframes appear {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

div.drop-container:before,
div.drop-container:after {
  content: "";
  position: absolute;
  z-index: -1;
  top: 55%;
  right: 50%;
  transform: translate(50%) rotateX(75deg);
  border-radius: 100%;
  opacity: 0;
  width: 75%;
  height: 75%;
  border: 5px solid skyblue;
  animation: dripple 1.8s ease-out 1.2s;
}

div.drop-container:after {
  animation: dripple 1.6s ease-out 1.7s;
}

@keyframes drip {
  85% {
    top: 0;
    border-radius: 90% 1% 90% 100%;
    transform: rotate(-45deg);
  }

  100% {
    top: 0;
    border-radius: 90% 1% 90% 100%;
  }
}

@keyframes dripple {
  0% {
    width: 150px;
    height: 150px;
  }

  25% {
    opacity: 1;
  }

  100% {
    width: 500px;
    height: 500px;
    top: -20%;
    opacity: 0;
  }
}
</style>
