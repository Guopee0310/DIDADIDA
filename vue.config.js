const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  css: {
    loaderOptions: {
      scss: {
        additionalData: `
        @import "~@/assets/scss/style.scss";
        `
      },
    }
  }
})
// @import "~@/assets/scss/base/base.scss";
// @import "~@/assets/scss/base/reset.scss";
// @import "~@/assets/scss/base/font.scss";
// @import "~@/assets/scss/base/color.scss";
// @import "~@/assets/scss/mixin/btn.scss";