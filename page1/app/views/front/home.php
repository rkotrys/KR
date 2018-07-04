    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="images/back01.png" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h3>Politechnika Poznańska</h3>

                <h1>
                    Katedra Radiokomunikacji <br>
                </h1>

                <div class="home-content__buttons">
                    <a href="#achievements" class="smoothscroll btn btn--stroke">
                        Osiągnięcia
                    </a>
                    <a href="#clients" class="smoothscroll btn btn--stroke">
                        Pracownicy
                    </a>
                </div>

            </div>

            <div class="home-content__scroll">
                <a href="#about" class="scroll-link smoothscroll">
                    <span>Przewiń</span>
                </a>
            </div>

            <div class="home-content__line"></div>

        </div> <!-- end home-content -->


        <ul class="home-social">
            <li>
                <a href="#didactics"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Dydaktyka</span></a>
            </li>
            <li>
                <a href="#0" id="loginbt"><i class="fa fa-sign-in" aria-hidden="true" ></i><span>Logowanie</span></a>
        <!-- login form -->           
    <div id="modallogin">
    <form method="post">
        <input type="text" name="uname" placeholder="<?=lang('User');?>"><input type="password" name="upass" value="" placeholder="<?=lang('Password');?>" >
    </form>    
    </div>
    <script src="<?=conf("base_url_path")?>js/login.js"></script>
       <!-- end login form -->
            </li>
            <li>
                <a id="langtogle" href="lang/language/<?=($this->session->language=='polish')?"english":"polish";?>"><i class="fa fa-language" aria-hidden="true"></i><span><?=$this->session->language;?></span></a>
            </li>
        </ul> 
        <!-- end home-social -->

    </section> <!-- end s-home -->
    