<?php 
$pageTitle = 'Repeater Kompleks Vue - Edit';
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
                            <div class="card-body px-3">

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

                                <div class="form-group row" :class="{ 'has-error': submitErrors.pesanan }">
                                    <div class="col-xs-3 col-md-2">
                                        <label class="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Daftar Pesanan</label>
                                    </div>

                                    <div class="col-xs-9 col-md-10">
                                        <button type="button" class="btn btn-sm btn-default" v-on:click="addPesanan"><i class="ph ph-plus"></i> <span>Add</span></button>
                                        <span v-if="submitErrors.pesanan" class="help-block">@@{{submitErrors.pesanan}}</span>
                                        
                                        <div class="mt-2">
                                            <div v-for="(psn, index_psn) in $v.pesanan.$each.$iter" v-bind:key="index_psn">
                                                <div class="form-group row">
                                                    <div class="col-10">
                                                        <div class="form-group row" :class="{ 'has-error': psn.nama.$error }">
                                                            <div class="col-xs-3 col-md-3">
                                                                <label class="control-label text-left font-weight-normal d-flex justify-content-start align-items-center">Nama</label>
                                                            </div>
                                                            <div class="col-xs-9 col-md-9">
                                                                <input type="text" class="form-control" placeholder="Nama" required :name="'pesanan['+index_psn+'][nama]'" v-model="psn.nama.$model">
                                                                <span v-if="psn.nama.$error && !psn.nama.required" class="help-block">Nama wajib diisi</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" :class="{ 'has-error': psn.pembayaran.$error }">
                                                            <div class="col-xs-3 col-md-3">
                                                                <label class="control-label text-left font-weight-normal d-flex justify-content-start align-items-center">Pembayaran</label>
                                                            </div>
                                                            <div class="col-xs-9 col-md-9">
                                                                <select class="form-control" required :name="'pesanan['+index_psn+'][pembayaran]'" v-model="psn.pembayaran.$model">
                                                                    <option value="bank">Bank Transfer</option>
                                                                    <option value="emoney">E Money</option>
                                                                </select>
                                                                <span v-if="psn.pembayaran.$error && !psn.pembayaran.required" class="help-block">Pembayaran wajib diisi</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" :class="{ 'has-error': psn.subpembayaran.$error }" v-if="'bank' === psn.pembayaran.$model">
                                                            <div class="col-xs-3 col-md-3">
                                                                <label class="control-label text-left font-weight-normal d-flex justify-content-start align-items-center">Bank Tujuan</label>
                                                            </div>
                                                            <div class="col-xs-9 col-md-9">
                                                                <select class="form-control" required :name="'pesanan['+index_psn+'][subpembayaran]'" v-model="psn.subpembayaran.$model">
                                                                    <option value="bni">BNI</option>
                                                                    <option value="mandiri">Mandiri</option>
                                                                    <option value="bca">BCA</option>
                                                                </select>
                                                                <span v-if="psn.subpembayaran.$error && !psn.subpembayaran.required" class="help-block">Bank tujuan wajib diisi</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" :class="{ 'has-error': psn.subpembayaran.$error }" v-if="'emoney' === psn.pembayaran.$model">
                                                            <div class="col-xs-3 col-md-3">
                                                                <label class="control-label text-left font-weight-normal d-flex justify-content-start align-items-center">Platform</label>
                                                            </div>
                                                            <div class="col-xs-9 col-md-9">
                                                            <select class="form-control" required :name="'pesanan['+index_psn+'][subpembayaran]'" v-model="psn.subpembayaran.$model">
                                                                <option value="gopay">GoPay</option>
                                                                <option value="ovo">OVO</option>
                                                                <option value="Dana">Dana</option>
                                                            </select>
                                                            <span v-if="psn.subpembayaran.$error && !psn.subpembayaran.required" class="help-block">Platform wajib diisi</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-xs-3 col-md-3">
                                                                <label class="control-label text-left font-weight-normal d-flex justify-content-start align-items-center">Daftar Barang</label>
                                                            </div>
                                                            <div class="col-xs-9 col-md-9">
                                                                <button type="button" class="btn btn-sm btn-default" v-on:click="addBarang(index_psn)"><i class="ph ph-plus"></i> <span>Add</span></button>
                                                            </div>
                                                        </div>
                                                        <table class="table table-bordered mt-2">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kategori</th>
                                                                    <th>Barang</th>
                                                                    <th>Jumlah</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="(brg, index_brg) in psn.barang.$each.$iter" v-bind:key="index_brg">
                                                                    <td :class="{ 'has-error': brg.kategori.$error }">
                                                                        <select class="form-control" required :name="'pesanan['+index_psn+'][barang]['+index_brg+'][kategori]'" v-model="brg.kategori.$model" @change="loadBarangOptions($event,index_psn,index_brg)">
                                                                            <option value="makanan">Makanan</option>
                                                                            <option value="minuman">Minuman</option>
                                                                        </select>
                                                                        <span v-if="brg.kategori.$error && !brg.kategori.required" class="help-block">Kategori wajib diisi</span>
                                                                    </td>
                                                                    <td :class="{ 'has-error': brg.barang.$error }">
                                                                        <select class="form-control" required :name="'pesanan['+index_psn+'][barang]['+index_brg+'][barang]'" v-model="brg.barang.$model">
                                                                            <option v-if="barangOptions[index_psn].barang[index_brg].options" v-for="(brg_opt, index_brg_opt) in barangOptions[index_psn].barang[index_brg].options" v-bind:key="index_brg_opt" :value="brg_opt.id">@{{brg_opt.label}}</option>
                                                                        </select>
                                                                        <span v-if="brg.barang.$error && !brg.barang.required" class="help-block">Barang wajib diisi</span>
                                                                    </td>
                                                                    <td :class="{ 'has-error': brg.jumlah.$error }">
                                                                        <input type="number" class="form-control" :name="'pesanan['+index_psn+'][pembayaran]['+index_brg+'][jumlah]'" placeholder="Jumlah" required min="1" v-model="brg.jumlah.$model">
                                                                        <span v-if="brg.jumlah.$error && !brg.jumlah.required" class="help-block">Jumlah wajib diisi</span>
                                                                        <span v-if="brg.jumlah.$error && !brg.jumlah.minValue" class="help-block">Jumlah minimal harus 1</span>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-outline-danger" v-on:click="removeBarang(index_psn, index_brg)"><i class="ph ph-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-2 text-right">
                                                        <button type="button" class="btn btn-sm btn-outline-danger" v-on:click="removePesanan(index_psn)"><i class="ph ph-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-12 col-lg-6">

                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h3 class="card-title">Keterangan</h3>
                        </div>
                        <div class="card-body px-2">
                            <p>Dynamic options ketika pilih pembayaran diload di frontend (tanpa AJAX)</p>
                            <p>Dynamic options ketika pilih kategori barang diload dari server (AJAX)</p>
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

  const sampleData = {
    nama: 'John Doe',
    email: 'john@tonjoo.com',
    pesanan: [
    	{
    		nama: 'Pesanan 1',
    		pembayaran: 'bank',
    		subpembayaran: 'mandiri',
    		barang: [
		      {
		      	kategori: 'makanan',
		        barang: 'ayam',
		        jumlah: 4
		      },
		      {
		      	kategori: 'minuman',
		        barang: 'kopi',
		        jumlah: 3
		      }
		    ]
    	},
    	{
    		nama: 'Pesanan 2',
    		pembayaran: 'emoney',
    		subpembayaran: 'ovo',
    		barang: [
		      {
		      	kategori: 'minuman',
		        barang: 'teh',
		        jumlah: 4
		      },
		      {
		      	kategori: 'makanan',
		        barang: 'tempe',
		        jumlah: 3
		      }
		    ]
    	}
    ]
  }

  // main instance for Form 1 (Validate on submit).
  var app1 = new Vue({
    el: '#app1',
    data: {
      ...sampleData,
      submitStatus: 'idle',
      submitErrors: [],
      barangOptions: []
    },
    beforeMount: function(){ // load barang options from ajax before mount
    	if ( this.pesanan ) {
    		for ( let p in this.pesanan ) {
    			this.barangOptions.push({
		          barang: []
		        })
    			if ( this.pesanan[p].barang ) {
    				for ( let b in this.pesanan[p].barang ) {
    					this.barangOptions[p].barang.push({
				          options: []
				        })
    					if ( this.pesanan[p].barang[b].kategori ) {
    						axios.get('{{url('html/ajax-demo/ajax-get-barangs')}}?kategori='+this.pesanan[p].barang[b].kategori)
					          .then( res => {
					            if ( 200 == res.status ) {
					              this.barangOptions[p].barang[b].options = res.data;
					            }
					          });
    					}
    				}
    			}
    		}
    	}
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
      pesanan: {
        $each: {
          nama: {
            required
          },
          pembayaran: {
            required
          },
          subpembayaran: {
            required
          },
          barang: {
            $each: {
              kategori: {
                required
              },
              barang: {
                required
              },
              jumlah: {
                required,
                minValue: minValue(1)
              }
            }
          }
        }
      }
    },
    methods: {
      addPesanan: function() {
        this.pesanan.push({
          nama: '',
          pembayaran: '',
          subpembayaran: '',
          barang: []
        })
        this.barangOptions.push({
          barang: []
        })
      },
      removePesanan: function(index) {
        this.pesanan.splice(index, 1);
      },
      addBarang: function(index_psn) {
        this.pesanan[index_psn].barang.push({
          kategori: '',
          barang: '',
          jumlah: ''
        })
        this.barangOptions[index_psn].barang.push({
          options: []
        })
      },
      removeBarang: function(index_psn,index_brg) {
        this.pesanan[index_psn].barang.splice(index_brg, 1);
      },
      loadBarangOptions: function(event,index_psn,index_brg) {
        axios.get('{{url('html/ajax-demo/ajax-get-barangs')}}?kategori='+event.target.value)
          .then( res => {
            if ( 200 == res.status ) {
              this.barangOptions[index_psn].barang[index_brg].options = res.data;
            }
          });
      },
      handleSubmit: function(e) {
        this.submitStatus = 'pending';
        this.submitErrors = [];
        this.$v.$touch(); // trigger validate.
        console.log(this.$v);
        
        if ( ! this.$v.$error ) {
          let data = {
            nama: this.nama,
            email: this.email,
            pesanan: this.pesanan
          }

          axios.post('ajax-demo/ajax-submit-kompleks.php', data )
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
