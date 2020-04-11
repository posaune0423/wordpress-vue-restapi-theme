<template>
  <footer>
            <div id="left-footer">
                <h3>Quick link</h3>
                <p>
                    <ul>
                        <li><router-link to="/">Home</router-link></li>
                        <li><router-link to="/about">About</router-link></li>
                        <li><router-link to="/information">Information</router-link></li>
                        <li><router-link to="/concerts">Concerts</router-link></li>
                        <li><a href="https://agonew2019.wixsite.com/2020-ago-new">Looking for</a></li>
                        <li><router-link to="/contact">Contact</router-link></li>
                    </ul>
                </p>
            </div>
            <div id="right-footer">
                <h3>Follow us on</h3>
                <div id="social-media-footer">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/aoyamagakuinorchestra/">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/aoyamaorchestra">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UC6_-dbI_cSZbOf95QjBuaLg">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/aoyamaorchestra/?hl=ja">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <p>
                        All rights reserved by AGO
                    </p>
                </div>
            </div>
        </footer>
</template>

<style>
/* Footer */

footer {
    background-color: #eceae6;
    padding: 8px;
    color: #454545;
    display: flex;
    z-index: -20;
}

footer a {
    color: #454545;
    font-weight: 700;
    text-decoration: none;
}

footer h3 {
    color: #454545;
    margin-top: 18px;
    margin-bottom: 18px;
    font-size: 1.17em;
    font-weight: normal;
}

footer #left-footer {
    flex: 1;
    border-left: 32px;
    padding-left: 80px;
}

footer #left-footer ul {
    padding: 0;
    list-style: none;
    line-height: 1.5;
}

footer #right-footer {
    flex: 2;
    padding: 8px;
    text-align: center;
}

footer #social-media-footer a .fa-facebook,
footer #social-media-footer a .fa-twitter,
footer #social-media-footer a .fa-github {
    color: black;
    transition: 0.4s;
}

footer #social-media-footer ul {
    display: flex;
    list-style: none;
    justify-content: center;
    padding: 0;
}

footer #social-media-footer ul li {
    font-size: 32px;
    padding: 16px;
    transition: 0.4s;
}

footer #social-media-footer ul li:hover a .fa-facebook {
    color: #3b5998;
}

footer #social-media-footer ul li:hover a .fa-twitter {
    color: skyblue;
}

footer #social-media-footer ul li:hover a .fa-github {
    color: rgba(0, 0, 0, 0.4);
}

footer #social-media-footer ul li:hover a .fa-youtube {
    color: #eb3d46;
}

footer #social-media-footer ul li:hover a .fa-instagram {
    color: #d95bd9;
}

@media (min-width: 719) {
    footer #left-footer {
        flex: 1;
        border-right: 0;
        padding-left: 0;
        margin-left: 80;
    }
}

@media(max-width:719px) {
    footer {
        flex-direction: column;
        text-align: center;
    }

    footer #left-footer {
        flex: 1;
        border-right: 0;
        padding-left: 0;
        margin-left: 0;
    }

    footer #right-footer {
        background: #eee;
        color: black;
    }

    footer #right-footer a {
        color: black;
    }

    footer #social-media-footer a .fa-facebook,
    footer #social-media-footer a .fa-twitter,
    footer #social-media-footer a .fa-github {
        color: black;
        transition: 0.4s;
    }
}
</style>
