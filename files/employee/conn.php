<li><a href="#" data-toggle="modal" data-target="#change_password">Change Password</a></li> 
               <div class="modal  fade" id="change_password" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Change Password</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-3"><label>Current&nbsp;Password</label></div>
                                        <div class="col-md-8"><input type="password" class="form-control" id="c_pass" name="c_pass"></div>                
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-3"><label>New&nbsp;Password</label></div>
                                        <div class="col-md-8"><input type="password" class="form-control" id="n_pass" name="n_pass"></div>                
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-3"><label>Retype&nbsp;Password</label></div>
                                        <div class="col-md-8"><input type="password" class="form-control" id="r_pass" name="r_pass"></div>                
                                        </div>
                                    </div> 
                                    <?php if(isset($_GET['msg'])){echo $_GET['msg'];} ?>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="chg_pwd" class="btn btn-danger"     >Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>  