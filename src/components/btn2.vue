<template>
    <div @click="alertt">孫子</div>
 
 </template>
   
 <script>
 export default {
   name: 'btn2',
    methods: {
        alertt(){
            alert(123)
        }
    },
 }
 </script>
 <style scoped>
   div{
     color: red;
     font-size: 30px;
   }
 </style>