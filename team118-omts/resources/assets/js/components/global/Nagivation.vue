<style lang="scss">

  nav.top-navigation{
    background-color: $white;
    height: 50px;
    border-bottom: 2px solid $dark-color;

    span.logo{
      border-right: 1px solid $dark-color;
      display: block;
      float: left;
      height: 50px;
      line-height: 50px;
      padding: 0px 20px 0px 20px;
      font-family: 'Josefin Sans', sans-serif;
      font-weight: bold;
      color: $dark-color;

      &:hover{
        color: white;
        background-color: $dark-color;
      }
    }

    ul.links{
      display: block;
      float: left;

      li{
        display: inline-block;
        list-style-type: none;
        line-height: 50px;

        a{
          font-family: 'Lato', sans-serif;
          font-weight: bold;
          color: $black;

          &:hover{
            color: $dark-color;
          }
        }
      }
    }

    div.right{
      float: right;

      img.avatar{
        width: 40px;
        height: 40px;
        border-radius: 40px;
        margin-top: 5px;
        margin-right: 10px;
      }

      span.login{
        height: 50px;
        line-height: 50px;
        padding: 0px 20px 0px 20px;
        font-family: 'Josefin Sans', sans-serif;
        font-weight: bold;
        color: $dark-color;
        cursor: pointer;
      }

      a.profile{
        height: 50px;
        line-height: 50px;
        padding: 0px 20px 0px 20px;
        font-family: 'Josefin Sans', sans-serif;
        font-weight: bold;
        color: $dark-color;
        cursor: pointer;
      }

      span.logout{
        height: 50px;
        line-height: 50px;
        padding: 0px 20px 0px 20px;
        font-family: 'Josefin Sans', sans-serif;
        font-weight: bold;
        color: $dark-color;
        cursor: pointer;
      }
    }

    &:after{
      content: "";
      display: table;
      clear: both;
    }
  }
</style>

<template>
  <nav class="top-navigation">

    <router-link :to="{ name: 'home'}">
      <span class="logo">OMTS</span>
    </router-link>

    <ul class="links">
      <li>
        <router-link :to="{ name: 'complexes' }">
          Complexes
        </router-link>
      </li>
    </ul>

  </nav>
</template>

<script>

  export default {
  }
</script>
