<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Employee</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST" action="<?php echo site_url('Permissions/save') ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add Client </strong></h3>
                                  
                                </div>
                                <div class="panel-body"> 

                                    <?php if($this->session->flashdata('ClientSuccess')) { ?>                            
                                        <div class="alert alert-success">
                                          <strong><?php echo $this->session->flashdata('ClientSuccess') ?></strong>
                                        </div>
                                    <?php } ?>

                                    <?php if($this->session->flashdata('ClientFail')) { ?>                            
                                        <div class="alert alert-danger">
                                          <strong><?php echo $this->session->flashdata('ClientFail') ?></strong>
                                        </div>
                                    <?php } ?>


                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Permissions</th>
                                                <th></th>
                                                <th></th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                    foreach ($data['permissions'] as $permission) {
                                                        echo '<tr>
                                                                <td> '. $permission->type .' </td>
                                                                <td> <input class="icheckbox" type="checkbox" value="view" name="'. $permission->id .'[]" '. ($permission->view_permission ? 'checked' : '') .'> View </input> </td>
                                                                <td> <input class="icheckbox" type="checkbox" value="update" name="'. $permission->id .'[]"  '. ($permission->update_permission ? 'checked' : '') .'> Update </input> </td>
                                                                <td> <input class="icheckbox" type="checkbox" value="delete" name="'. $permission->id .'[]" '. ($permission->delete_permission ? 'checked' : '') .' > Delete </input> </td>
                                                        </tr>';
                                                    }
                                                ?>

                                            </tr>
                                        </tbody>
                                    </table>


                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Page Access</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                             <?php

                                                foreach ($data['pages'] as $page) {
                                                    echo '<tr> <td> '. $page->page  .' </td>';


                                                    foreach ($data['permissions'] as $permission) {
                                                        $pageAccess = json_decode($permission->page_access);
                                                                                        $id = $permission->id;
                                                        echo ' <td> <input class="icheckbox" type="checkbox" name="access'. $id .'[]" value="'. $page->page .'" '. (in_array($page->page, $pageAccess) ? 'checked' : '' ) .'> ' .  $permission->type. ' </input> </td>';
                                                    }

                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>


                                <div class="panel-footer">
                                    
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                    
</div>
<!-- END PAGE CONTENT WRAPPER -->