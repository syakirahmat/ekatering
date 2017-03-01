<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tempahan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">E-KATERING UTHM</div>
    <div class="address-bar">UTHM Parit Raja | Kampus Utama | 09-99999999</div>


    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="tempahan.php">E-KATERING UTHM</a>
             </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Utama</a>
                    </li>
                    <li>
                        <a href="cariankaterer.php">Carian Katerer</a>
                    </li>
                    <li>
                        <a href="menumakanan.php">Menu Makanan</a>
                    </li>
                    <li>
                        <a href="tempahan.php">Tempahan</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Tempahan</strong>
                    </h2>
                    <hr>
                    <h4><p>Sila masukkan maklumat anda</p></h4>
                    <form role="form"></form>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Nama</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Alamat</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>No. Telefon</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Bil. Kepala</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Lokasi Majlis</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Hidangan Buffet/Bungkus</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Pilih Katerer</label>
                                <div class="otw-restaurant-wrap otw-input-wrap">
                                                <select name="Caterer" class="otw-reservation-caterer selectpicker">
                                                    <option value="">pilih katerer..</option>
                                                    <option value="">Kraff Enterprise</option>
                                                    <option value="">Zee & 1 Enterprise</option>
                                                    <option value="">Aziliah Catering</option>
                                                    <option value="">Masrilah Enterprise</option>
                                                    <option value="">Zainah Enterprise</option>
                                                    <option value="">Iskandar Busri
                                                    <option value="">Puncak Kaliza Enterprise</option>
                                                </select>
                                            </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Pilih Tarikh</label>
                                <form class="wpcf7">
                                <fieldset>
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <input type="date" class="date" id="da" placeholder="choose date" style="float: none">
                                    </span>
                                </fieldset>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Pilih Masa</label>
                                <div class="otw-time-wrap otw-input-wrap">
                                                <select name="Event Time" class="otw-reservation-time selectpicker">
                                                <option value="">Pilih Masa..</option>
                                                    <option value="8:00am">8:00 pm</option>
                                                    <option value="12:30pm">12:30 pm</option>
                                                    <option value="2:00pm">2:00 pm</option>
                                                    <option value="4:30pm">4:30 pm</option>
                                                    <option value="8:30pm">8:30 pm</option>
                                                    <option value="9:00pm">9:00 pm</option>
                                                    <option value="9:30pm">9:30 pm</option>
                                                    <option value="10:00pm">10:00 pm</option>
                                                    <option value="10:30pm">10:30 pm</option>   
                                                </select>
                                            </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

      <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h4><p>Sila masukkan maklumat tempahan anda</p></h4>
                    <form role="form"></form>
                            <div class="form-group col-lg-4">
                                <label>Hidangan Utama:</label> 
                                                <select name="Rice" class="otw-reservation-caterer selectpicker">
                                                    <option value="">Pilih Hidangan Utama..</option>
                                                    <option value="">Nasi Putih</option>
                                                    <option value="">Nasi Goreng</option>
                                                    <option value="">Mihun</option>
                                                    <option value="">Mee</option>
                                                    <option value="">Laksa</option>
                                                    <option value="">Kuey tiew</option>
                                                    <option value="">Nyatakan lain-lain...</option>
                                                </select>
                                            </div>
                                              <div class="form-group col-lg-4">
                                              <label>Sayur:</label>
                                                <select name="Vegetables" class="otw-reservation-caterer selectpicker">
                                                    <option value="">Pilih Sayur..</option>
                                                    <option value="">Sayur campur</option>
                                                    <option value="">Sayur acar</option>
                                                    <option value="">Pajeri Nenas</option>
                                                    <option value="">Nyatakan lain-lain...</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                            <label>Minuman:</label>
                                                <select name="Drink" class="otw-reservation-caterer selectpicker">
                                                    <option value="">Pilih Minuman..</option>
                                                    <option value="">Air Sirap</option>
                                                    <option value="">Air Sunquick</option>
                                                    <option value="">Air Kordial Anggur</option>
                                                    <option value="">Air Kordial Strawberi</option>
                                                    <option value="">Air Kordial Jagung</option>
                                                    <option value="">Air Kordial Ribena 
                                                    <option value="">Nyatakan lain-lain...</option>
                                                </select>
                                            </div>

                                            
                                            <div class="form-group col-lg-4">
                                            <label>Buah-buahan:</label>
                                                <select name="Fruit" class="otw-reservation-caterer selectpicker">
                                                    <option value="">Pilih Buah..</option>
                                                    <option value="">Buah Tembikai</option>
                                                    <option value="">Buah Oren</option>
                                                    <option value="">Buah Pisang</option>
                                                    <option value="">Buah Nenas</option>
                                                    <option value="">Buah Tembikai Susu</option>
                                                    <option value="">Nyatakan lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="text">
                                                <form>

                                              
                                                <div class="form-group col-lg-4">
                                                <label>Kuih Muih:</label><br>
                                                    Kuih 1:<br>
                                                    <input type="text" name="Kuih-01">
                                                <br>
                                                    Kuih 2:<br>
                                                    <input type="text" name="Kuih-02">
                                                <br>
                                                    Kuih 3:<br>
                                                    <input type="text" name="Kuih-03">
                                                <br>
                                                     Lain-lain:<br>
                                                    <input type="text" name="lain-lain">
                                                </div>
                                                </form>
                                            </div>
                                            <div class="text">
                                                <form> 
                                                
                                                <div class="form-group col-lg-4">
                                                <label>Tambahan:</label><br>
                                                    Jenis hidangan 1:<br>
                                                    <input type="text" name="menu-01">
                                                <br>
                                                    Jenis hidangan 2:<br>
                                                    <input type="text" name="menu-02">
                                                <br>
                                                    Jenis hidangan 3:<br>
                                                    <input type="text" name="menu-03">
                                                <br>
                                                     Lain-lain:<br>
                                                    <input type="text" name="lain-lain">
                                                </div>
                                                </form>
                                            </div>
                    </form>

                    <div class="otw-button-wrap">

                        <center><input type="submit" class="otw-submit" value="Submit"></center>
                        </div>
                         </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; e-katering UTHM Website 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
