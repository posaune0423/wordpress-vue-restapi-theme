<template>
  <div id="slideout-menu">
      <h3>AGO</h3>
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/about">About</router-link></li>
        <li><router-link to="/concerts">Concerts</router-link></li>
        <li><router-link to="/information">Information</router-link></li>
        <li><a href="https://agonew2019.wixsite.com/2020-ago-new">Looking for</a></li>
        <li><router-link to="/contact">Contact</router-link></li>
      </ul>
  </div>
</template>

<script>
export default {
    name: 'SlideOut'
}
</script>

<style>

/* SlideOut Menu */
#slideout-menu {
    z-index: 3;
    top: 0;
    left: 0;
    background: #fff;
    position: fixed;
    /* transition: 0.4s;*/
    width: 260px;
    height: 100%;
    /* margin-top: 90px; */
    text-align: center;
    transform: translateX(-260px);
    transition: transform 250ms ease-in-out;
}

#slideout-menu.open {
    transform: translate(0);
}

#slideout-menu ul {
    list-style: none;
    padding-left: 0;
}

#slideout-menu ul li {
    padding-top: 8px;
    padding-bottom: 8px;
    height: 57px;
}

#slideout-menu h3 {
    font-size: 1.17em;
}

#slideout-menu a {
    font-size: 19px;
    color: #757575;
    text-decoration: none;
}

#slideout-menu h3 {
    color: #757575;
    padding-top: 50px;
    padding-bottom: 50px;
}
</style>