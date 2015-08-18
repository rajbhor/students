<?php 
 ?><form action="<?php echo $bases;?>actions/processPasswordChange.php" id="passwordForm" method="post" name="frmchng"    > 
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Change password</h4>
                        </div>     
                        <div class="row-form clearfix">
                            <div class="span4">Current Password</div>
                            <div class="span8"><input type="text" name="currentPassword" value="<?php echo $password ?>" /></div>
                        </div>                                            
                        <div class="row-form clearfix">
                            <div class="span4">New Password</div>
                            <div class="span8"><input type="password" id="newPassword" name="newPassword" />
                            <span id="error"  style="display:none" class="required">This is required</span>
                            <span id="error3"  style="display:none" class="required">Password must be at least 8 characters</span>
                            <span id="error4"  style="display:none" class="required">Your password must contain at least one letter</span>
                            <span id="error5"  style="display:none" class="required">Your password must contain at least one digit</span></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Confirm Password</div>
                            <div class="span8"><input type="password" id="confirmPassword" name="confirmPassword"/><span style="display:none" id="error1" class="required">This is required</span><span style="display:none" id="error2" class="required">Password Mismatch</span></div>
                        </div>                        
                        <div class="toolbar clearfix">
                            <div class="right"> 
                            <div class="btn-group">                               
                                <button type="button" onclick="return validatePassword()" class="btn btn-small btn-warning tip">save</button>                                
                            </div>
                            </div>
                        </div>                         
                    </div>    
                </form>