<?php 
$pageTitle = 'Repeater Simple Vue - New';
$breadcrumbs = array( 
    ['Home', '#'],
    [ $pageTitle, '#']
);
?>

@include("html._head-start")

@include("html._head-end")

@include("html._navbar")

@include("html._sidebar")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header page-header">
        <div class="container-fluid">
            <div class="row flex-column-reverse mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1><?php echo (!empty( $pageTitle )) ? $pageTitle : '' ;?> <small class="ml-1">Preview</small></h1>
                </div>
                <div class="col-sm-6 mb-2">
                    <?php if ( !empty( $breadcrumbs ) ) { ?>
                        <ol class="breadcrumb d-lg-none d-md-none">
                            <?php $bci = 0;
                            foreach ($breadcrumbs as $bc) {?>
                                <li class="breadcrumb-item <?php echo ( $bci == array_key_last($breadcrumbs)) ? 'active' : ''; ?>">
                                    <?php if ( $bci !== array_key_last($breadcrumbs) ) { ?>
                                        <a href="<?php echo $bc[1] ?>"><?php echo $bc[0] ?></a>
                                    <?php }else{ ?>
                                        <span><?php echo $bc[0] ?></span>
                                    <?php } ?>
                                </li>
                            <?php $bci++; }?>
                        </ol>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                
            <div class="row">
                <div class="col-12 col-lg-6">

                    <form class="form-horizontal text-left" id="app1" ref="form" @submit.prevent="handleSubmit" novalidate="true">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h3 class="card-title">Validate on submit</h3>
                            </div>
                            <div class="card-body px-2">

                                <div class="alert alert-danger" v-if="'error' == submitStatus">
                                    <p class="mb-0"><i class="ph ph-x-circle"></i> <span>Terdapat kesalahan, cek kembali inputan Anda.</span></p>
                                </div>

                                <div class="alert alert-success" v-if="'success' == submitStatus">
                                    <p class="mb-0"><i class="ph ph-check-circle"></i> <span>Form berhasil terkirim.</span></p>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.nama.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputNama" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama Lengkap</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" required name="nama" v-model="nama">
                                        <span v-if="$v.nama.$error && !$v.nama.required" class="help-block">Nama wajib diisi</span>
                                        <span v-if="$v.nama.$error && !$v.nama.minLength" class="help-block">Nama minimal @{{$v.nama.$params.minLength.min}} karakter</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.email.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputEmail" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Email</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="email" class="form-control form-control-sm" id="inputEmail" placeholder="Email" required name="email" v-model="email">
                                        <span v-if="$v.email.$error && !$v.email.required" class="help-block">Email wajib diisi</span>
                                        <span v-if="$v.email.$error && !$v.email.email" class="help-block">Format email salah</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.username.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputUsername" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Username</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="text" class="form-control form-control-sm" id="inputUsername" placeholder="Username" required name="username" v-model="username">
                                        <span v-if="$v.username.$error && !$v.username.required" class="help-block">Username wajib diisi</span>
                                        <span v-if="$v.username.$error && !$v.username.isUsernameUnique" class="help-block">Username '@{{$v.username.$model}}' sudah dipakai</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.telepon.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputTelepon" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="text" class="form-control form-control-sm" id="inputTelepon" placeholder="Telepon" required name="telepon" v-model="telepon">
                                        <span v-if="$v.telepon.$error && !$v.telepon.required" class="help-block">Telepon wajib diisi</span>
                                        <span v-if="$v.telepon.$error && !$v.telepon.isPhone" class="help-block">Nomor telepon tidak valid</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.usia.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputUsia" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Usia</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="number" class="form-control form-control-sm" id="inputUsia" placeholder="Usia" required name="usia" v-model="usia">
                                        <span v-if="$v.usia.$error && !$v.usia.required" class="help-block">Usia wajib diisi</span>
                                        <span v-if="$v.usia.$error && !$v.usia.between" class="help-block">Usia harus diantara @{{$v.usia.$params.between.min}} - @{{$v.usia.$params.between.max}}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-xs-3 col-md-2">
                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Riwayat Pendidikan</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <div v-for="(rwy, index) in riwayat" v-bind:key="index">
                                            <input type="text" class="form-control form-control-sm" :name="'riwayat['+index+'][pendidikan]'" v-model="rwy.pendidikan" style="display: inline-block; width: 200px; margin-bottom: 5px; padding: 4px 12px; height: 30px;">
                                            <button type="button" class="btn btn-sm btn-outline-danger ml-1" v-on:click="removeRiwayat(index)">
                                                <i class="ph ph-trash"></i>
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-default btn-sm" value="Add" v-on:click="addRiwayat"><i class="ph ph-plus"></i> Add</button>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': submitErrors.barang }">
                                    <div class="col-xs-3 col-md-2">
                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <button type="button" class="btn btn-default btn-sm" value="Add" v-on:click="addBarang"><i class="ph ph-plus"></i> Add</button>
                                        <span v-if="submitErrors.barang" class="help-block">@{{submitErrors.barang}}</span>
                                    </div>
                                </div>

                                <table class="table table-compact table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th width="80"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(brg, index) in $v.barang.$each.$iter" v-bind:key="index">
                                            <td :class="{ 'has-error': brg.nama.$error }">
                                                <input type="text" class="form-control form-control-sm" :name="'barang['+index+'][nama]'" placeholder="Nama" required v-model="brg.nama.$model">
                                                <span v-if="brg.nama.$error && !brg.nama.required" class="help-block">Nama wajib diisi</span>
                                            </td>
                                            <td :class="{ 'has-error': brg.jumlah.$error }">
                                                <input type="number" class="form-control form-control-sm" :name="'barang['+index+'][jumlah]'" placeholder="Jumlah" required min="1" v-model="brg.jumlah.$model">
                                                <span v-if="brg.jumlah.$error && !brg.jumlah.required" class="help-block">Jumlah wajib diisi</span>
                                                <span v-if="brg.jumlah.$error && !brg.jumlah.minValue" class="help-block">Jumlah minimal harus 1</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-danger" v-on:click="removeBarang(index)">
                                                    <i class="ph ph-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h3 class="card-title">Simulasi aturan validasi</h3>
                        </div>
                        <div class="card-body px-2">
                            <table class="table table-compact table-bordered">
                                <thead>
                                    <tr>
                                    <th>Field</th>
                                    <th>Rule</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>Minimal 4 karakter</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>Format email</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>Validasi AJAX. Jika username = 'aminah' bakal error</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>Regex format nomor telepon</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">Usia</td>
                                        <td>Harus angka</td>
                                    </tr>
                                    <tr>
                                        <td>Usia minimal 20, maksimal 30</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Barang</td>
                                        <td>Jumlah total barang tidak boleh kosong dan maksimal 10 (validasi via AJAX, dicek ketika disubmit)</td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6">

                    <form class="form-horizontal text-left" id="app2" @submit="handleSubmit" novalidate="true">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h3 class="card-title">Validate on submit</h3>
                            </div>
                            <div class="card-body px-2">

                                <div class="alert alert-danger" v-if="'error' == submitStatus">
                                    <p class="mb-0"><i class="ph ph-x-circle"></i> <span>Terdapat kesalahan, cek kembali inputan Anda.</span></p>
                                </div>

                                <div class="alert alert-success" v-if="'success' == submitStatus">
                                    <p class="mb-0"><i class="ph ph-check-circle"></i> <span>Form berhasil terkirim.</span></p>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.nama.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputNama" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Nama Lengkap</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="text" class="form-control form-control-sm" id="inputNama" placeholder="Nama" required name="nama" v-model="nama" @blur="$v.nama.$touch()">
                                        <span v-if="$v.nama.$error && !$v.nama.required" class="help-block">Nama wajib diisi</span>
                                        <span v-if="$v.nama.$error && !$v.nama.minLength" class="help-block">Nama minimal @{{$v.nama.$params.minLength.min}} karakter</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.email.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputEmail" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Email</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="email" class="form-control form-control-sm" id="inputEmail" placeholder="Email" required name="email" v-model="email" @blur="$v.email.$touch()">
                                        <span v-if="$v.email.$error && !$v.email.required" class="help-block">Email wajib diisi</span>
                                        <span v-if="$v.email.$error && !$v.email.email" class="help-block">Format email salah</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.username.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputUsername" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Username</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="text" class="form-control form-control-sm" id="inputUsername" placeholder="Username" required name="username" v-model="username" @blur="$v.username.$touch()">
                                        <span v-if="$v.username.$error && !$v.username.required" class="help-block">Username wajib diisi</span>
                                        <span v-if="$v.username.$error && !$v.username.isUsernameUnique" class="help-block">Username '@{{$v.username.$model}}' sudah dipakai</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.telepon.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputTelepon" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Telepon</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="text" class="form-control form-control-sm" id="inputTelepon" placeholder="Telepon" required name="telepon" v-model="telepon" @blur="$v.telepon.$touch()">
                                        <span v-if="$v.telepon.$error && !$v.telepon.required" class="help-block">Telepon wajib diisi</span>
                                        <span v-if="$v.telepon.$error && !$v.telepon.isPhone" class="help-block">Nomor telepon tidak valid</span>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': $v.usia.$error }">
                                    <div class="col-xs-3 col-md-2">
                                        <label for="inputUsia" class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Usia</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <input type="number" class="form-control form-control-sm" id="inputUsia" placeholder="Usia" required name="usia" v-model="usia" @blur="$v.usia.$touch()">
                                        <span v-if="$v.usia.$error && !$v.usia.required" class="help-block">Usia wajib diisi</span>
                                        <span v-if="$v.usia.$error && !$v.usia.between" class="help-block">Usia harus diantara @{{$v.usia.$params.between.min}} - @{{$v.usia.$params.between.max}}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-xs-3 col-md-2">
                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Riwayat Pendidikan</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <div v-for="(rwy, index) in riwayat" v-bind:key="index">
                                            <input type="text" class="form-control form-control-sm" :name="'riwayat['+index+'][pendidikan]'" v-model="rwy.pendidikan" style="display: inline-block; width: 200px; margin-bottom: 5px; padding: 4px 12px; height: 30px;">
                                            <button type="button" class="btn btn-sm btn-outline-danger ml-1" v-on:click="removeRiwayat(index)">
                                                <i class="ph ph-trash"></i>
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-default btn-sm" value="Add" v-on:click="addRiwayat"><i class="ph ph-plus"></i> Add</button>
                                    </div>
                                </div>

                                <div class="form-group row" :class="{ 'has-error': submitErrors.barang }">
                                    <div class="col-xs-3 col-md-2">
                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Barang</label>
                                    </div>
                                    <div class="col-xs-9 col-md-10">
                                        <button type="button" class="btn btn-default btn-sm" value="Add" v-on:click="addBarang"><i class="ph ph-plus"></i> Add</button>
                                        <span v-if="submitErrors.barang" class="help-block">@{{submitErrors.barang}}</span>
                                    </div>
                                </div>

                                <table class="table table-compact table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th width="80"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(brg, index) in $v.barang.$each.$iter" v-bind:key="index">
                                            <td :class="{ 'has-error': brg.nama.$error }">
                                                <input type="text" class="form-control form-control-sm" :name="'barang['+index+'][nama]'" placeholder="Nama" required v-model="brg.nama.$model" @blur="brg.nama.$touch()">
                                                <span v-if="brg.nama.$error && !brg.nama.required" class="help-block">Nama wajib diisi</span>
                                            </td>
                                            <td :class="{ 'has-error': brg.jumlah.$error }">
                                                <input type="number" class="form-control form-control-sm" :name="'barang['+index+'][jumlah]'" placeholder="Jumlah" required min="1" v-model="brg.jumlah.$model" @blur="brg.jumlah.$touch()">
                                                <span v-if="brg.jumlah.$error && !brg.jumlah.required" class="help-block">Jumlah wajib diisi</span>
                                                <span v-if="brg.jumlah.$error && !brg.jumlah.minValue" class="help-block">Jumlah minimal harus 1</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-danger" v-on:click="removeBarang(index)">
                                                    <i class="ph ph-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>

                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h3 class="card-title">Simulasi aturan validasi</h3>
                        </div>
                        <div class="card-body px-2">
                            <p>Untuk implementasi repeater ada sedikit perbedaan looping antara repeater yang perlu divalidasi dan tidak. Contohnya untuk repeater <strong>Riwayat Pendidikan</strong> tanpa menggunakan validasi dan repeater <strong>Daftar Barang</strong> menggunakan validasi. Cek kondingan untuk melihat perbedaannya.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.content-wrapper -->


@include("html._footer-start")

<!-- BEGIN: Insert additional plugin js -->

<script src={{url("https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js")}}></script>
<script src={{url("dist/plugins/axios/axios.min.js")}}></script>
<script src={{url("dist/plugins/vuelidate/vuelidate.min.js")}}></script>
<script src={{url("dist/plugins/vuelidate/validators.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{url("dist/js/demo.js")}}></script>

<script>

	Vue.use(window.vuelidate.default);
	const {
		required,
		email,
		between,
		minLength,
    minValue
	} = window.validators

  // main instance for Form 1 (Validate on submit).
  var app1 = new Vue({
    el: '#app1',
    data: {
      nama: '',
      email: '',
      username: '',
      telepon: '',
      usia: '',
      riwayat: [],
      barang: [],
      submitStatus: 'idle',
      submitErrors: []
    },
    validations: {
      nama: {
        required,
        minLength: minLength(4)
      },
      email: {
        required,
        email
      },
      username: {
        required,
        isUsernameUnique(username) {
          if (username === '') return true
          return axios.get('ajax-demo/ajax-unique-username.php?username='+username)
            .then( res => {
              return res.data //res.data has to return true or false after checking if the username exists in DB
            }) 
        }
      },
      telepon: {
        required,
        isPhone(telepon) {
          return /\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/.test(telepon)
        }
      },
      usia: {
        required,
        between: between(20,30)
      },
      barang: {
        $each: {
          nama: {
            required
          },
          jumlah: {
            required,
            minValue: minValue(1)
          }
        }
      }
    },
    methods: {
      addRiwayat: function() {
        this.riwayat.push({
          pendidikan: ''
        })
      },
      removeRiwayat: function(index) {
        this.riwayat.splice(index, 1);
      },
      addBarang: function() {
        this.barang.push({
          nama: '',
          jumlah: ''
        })
      },
      removeBarang: function(index) {
        this.barang.splice(index, 1);
      },
      handleSubmit: function(e) {
        this.submitStatus = 'pending';
        this.submitErrors = [];
        this.$v.$touch(); // trigger validate.
        // console.log(this.$v);
        
        if ( ! this.$v.$error ) {
          let data = {
            nama: this.nama,
            email: this.email,
            username: this.username,
            telepon: this.telepon,
            usia: this.usia,
            barang: this.barang
          }

          axios.post('ajax-demo/ajax-submit-simple.php', data )
            .then( res => {
              if ( 200 == res.status ) {
                console.log(res.data)
                if ( true === res.data.error ) {
                  this.submitErrors = res.data.errors;
                  this.submitStatus = 'error';
                } else {
                  this.submitStatus = 'success';
                }
              } else {
                this.submitStatus = 'error';
              }
            });
        } else {
          this.submitStatus = 'error';
        }
      }
    }
  });

  // main instance for Form 2 (Validate on change).
  var app2 = new Vue({
    el: '#app2',
    data: {
      nama: '',
      email: '',
      username: '',
      telepon: '',
      usia: '',
      riwayat: [],
      barang: [],
      submitStatus: 'idle',
      submitErrors: []
    },
    validations: {
	    nama: {
	      required,
	      minLength: minLength(4)
	    },
	    email: {
	    	required,
	    	email
	    },
	    username: {
	    	required,
        isUsernameUnique(username) {
          if (username === '') return true
          return axios.get('ajax-demo/ajax-unique-username.php?username='+username)
            .then( res => {
              return res.data //res.data has to return true or false after checking if the username exists in DB
            }) 
        }
	    },
	    telepon: {
	    	required,
        isPhone(telepon) {
          return /\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/.test(telepon)
        }
	    },
	    usia: {
	    	required,
	    	between: between(20,30)
	    },
	    barang: {
	    	$each: {
	    		nama: {
	    			required
	    		},
          jumlah: {
            required,
            minValue: minValue(1)
          }
	    	}
	    }
	  },
    methods: {
      addRiwayat: function() {
        this.riwayat.push({
          pendidikan: ''
        })
      },
      removeRiwayat: function(index) {
        this.riwayat.splice(index, 1);
      },
      addBarang: function() {
        this.barang.push({
          nama: '',
          jumlah: ''
        })
      },
      removeBarang: function(index) {
      	this.barang.splice(index, 1);
      },
      handleSubmit: function(e) {
        this.submitStatus = 'pending';
        this.submitErrors = [];
        this.$v.$touch(); // trigger validate.
        // console.log(this.$v);
        
        if ( ! this.$v.$error ) {
          let data = {
            nama: this.nama,
            email: this.email,
            username: this.username,
            telepon: this.telepon,
            usia: this.usia,
            barang: this.barang
          }

          axios.post('ajax-demo/ajax-submit-simple.php', data )
            .then( res => {
              if ( 200 == res.status ) {
                console.log(res.data)
                if ( true === res.data.error ) {
                  this.submitErrors = res.data.errors;
                  this.submitStatus = 'error';
                } else {
                  this.submitStatus = 'success';
                }
              } else {
                this.submitStatus = 'error';
              }
            });
        } else {
          this.submitStatus = 'error';
        }
      }
    }
  });
</script>

<!-- END: Insert additional plugin js -->

@include("html._footer-end")
