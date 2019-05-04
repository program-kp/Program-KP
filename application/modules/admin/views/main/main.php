<script>
    var baseUrl = '<?php echo base_url('admin');?>/';
</script>
<div id="page" >
    <div v-if="progressLoad" class="alert alert-info text-center">
        <span><i class="fa fa-cog fa-spin" aria-hidden="true" style="font-size: 63px;"></i></span>
        <h4 style="font-size: 63px;">Memuat Halaman</h4>
    </div>
    <div v-html="content">

    </div>
</div>