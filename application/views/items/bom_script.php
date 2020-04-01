<script>
    $(document).ready(function(){
        /**
        * Get material id list options - by typing material name, color and id
        */
        $('#txtMatlId').on("keyup", function(){
            $.ajax({
                type: "get", 
                url: "<?php echo base_url('items/bom/get_matl_options_by_search'); ?>", 
                data: "keyword="+$(this).val(), 
                success: function(res)
                {
                    $('#listMatl').html(res); 
                }, 
                error: function(xhr)
                {
                    var xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            }); 
        }); 

        /**
        * Get material description 
        */
        $('#txtMatlId').on("blur", function(){
            $.ajax({
                type: "get", 
                url: "<?php echo base_url('items/bom/get_matl_desc_by_id'); ?>", 
                data: "matlid="+$(this).val(), 
                success: function(res)
                {
                    $('#txtMatlName').val(res); 
                }, 
                error: function(xhr)
                {
                    var xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            }); 
        }); 

        /**
        * Submit add bill of material form
        */
        $('#formAddBom').submit(function(event){
            // Prevent default
            event.preventDefault(); 

            // Ajax form submit
            $.ajax({
                type: "post", 
                url: "<?php echo base_url('items/bom/add_bom'); ?>", 
                data: $(this).serialize(), 
                dataType: "json", 
                beforeSend: function()
                {
                    $('#loader').show(); 
                }, 
                complete: function()
                {
                    $('#loader').hide(); 
                }, 
                success: function(res)
                {	
                    if(res.status == 'success')
                    {
                        $('#tblBom').prepend(res.data).fadeIn('slow'); 
                    }
                    else swal({title: res.title, text: res.data, icon: res.status});
                }, 
                error: function(xhr)
                {
                    var xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            }); 
        }); 

        /**
        * Initialize datatable on bill of materials
        */
        var dt_bom = $('#tblBom').DataTable({
            fixedHeader: {headerOffset: $('#topNav').outerHeight()},
            "aaSorting": [], 
            "order": [[ 1, "desc" ]],
            "paging": true,
        }); 

        /**
        * Search bill of materials datatable
        */
        $('#txtSearchBom').on('keyup', function(){
            dt_bom.search($('#txtSearchBom').val()).draw();
        });

        /**
        * Delete bill of material
        */
        $('#tblBom').on('click', '.lnk-del-bom', function(){
            
            // Variables to be used further
            var prod_id  = $(this).attr('prod-id');
            var matl_id  = $(this).attr('matl-id'); 
            var del_row  = $(this).closest('tr');

            // Alert user before delete
            swal({
                title: "Confirm Delete!", 
                text: "Are you sure you want to delete this material?", 
                icon: "warning", 
                buttons: ["No", "Yes"], 
                dangerMode: true
            })
            .then((willdelete) => {
                if(willdelete) ajax_del_bom(prod_id, matl_id, del_row);
            }); 
        });

        /**
        * Function to delete bill of material
        * 
        * @param	integer 	prod_id 	Product id
        * @param 	integer		matl_id		Material id
        * @param	Object		del_row		Html deleted row 
        * @return Mix
        */
        function ajax_del_bom(prod_id, matl_id, del_row)
        {
            $.ajax({
                type: "get", 
                url: "<?php echo base_url('items/bom/delete_bom'); ?>", 
                data: "prodid="+prod_id+"&matlid="+matl_id,  
                dataType: "json", 
                beforeSend: function()
                {
                    $('#loader').show()
                }, 
                complete: function()
                {
                    $('#loader').hide()
                }, 
                success: function(res)
                {
                    if(res.status == 'success') 
                    {	
                        // Successfull deletion message
                        swal({title: res.title, text: res.data, icon: res.status});
                        
                        // Remove verify button
                        del_row.hide('slow', function(){del_row.remove();});
                    }
                    else swal({title: res.title, text: res.data, icon: res.status});
                }, 
                error: function(xhr)
                {	
                    var xhr_text = xhr.status+" "+xhr.statusText;
                    swal({title: "Request Error!", text: xhr_text, icon: "error"});
                }
            });
        }
    }); 
</script>