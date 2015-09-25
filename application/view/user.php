            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs">Search User</h2>
                            
                            <div class="lvh-search" style="display: none;">
                                <input type="text" placeholder="Start typing..." class="lvhs-input">
                                
                                <i class="lvh-search-close">×</i>
                            </div>

                            <ul class="lv-actions actions">
                                <li>
                                    <a href="contacts.html" class="lvh-search-trigger">
                                        <i class="zmdi zmdi-search"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown" =""="" aria-expanded="false" aria-haspopup="true">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#" id="gotoCreateUser">Create New user</a>
                                        </li>
                                        <li>
                                            <a href="#" id="gotUserList">User List</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                       
                        
                        <div class="card-body card-padding">
                            <!--Start Create User -->
                            <div class="row create_user">
                                 <div class="card-header">
                                    <h2>User Management</h2>
                                </div>
                                <div class="col-sm-6">                       
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtUsername" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtPassword" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtEmail" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group"> 
                                        <span  class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <select class="selectpicker" id="cmbGender">
                                                <option value="">Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                            
                                    </div>
                                   
                                    <br/>

                                   
                                </div>
                                
                                <div class="col-sm-6">                       
                                     <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtFirstName" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtLastName" class="form-control" placeholder="Last Name ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtContact" class="form-control" placeholder="Contact ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="input-group"> 
                                        <span  class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <select class="selectpicker" id="cmbUserType">
                                                <option value="">Usert Type</option>
                                                <option value="1">Sales Assistant</option>
                                                <option value="2">Product Specialist</option>
                                                <option value="3">Technician</option>

                                            </select>
                                        </div>
                                            
                                    </div>
                                    
                                </div>
                                <div class="col-sm-6">&nbsp;</div>
                                <div class="col-sm-6">
                                     <div class="btn-demo col-sm-6">
                                        <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                        <button class="btn bgm-lightblue waves-effect" id="btnSaveUser" ><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Save &nbsp;&nbsp;</button>
                                        <button class="btn bgm-lightblue waves-effect" id="btnUpdateuser"><i class="zmdi zmdi-edit"></i> Update</button>
                                        <button class="btn bgm-gray waves-effect" id="btnClearUser"> <i class="zmdi zmdi-tag-close"></i> Clear &nbsp;&nbsp;</button>    
                                    </div>
                                </div>
                               
                                
                            </div>
                            <!--Create User -->
                            <!-- User List -->
                            <div class="row user_list">
                                 <div class="card-header">
                                    <h2>Users List</h2>
                                </div>

                                <div class="table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Gender</th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userList">
                                            <tr>
                                                <td>Benjamin</td>
                                                <td>Parnell</td>
                                                <td>@wayne234</td>
                                                <td>Pokie</td>
                                                <td>6</td>
                                                <td>Benjamin</td>
                                                <td>Parnell</td>
                                                <td>@wayne234</td>
                                                <td><button class="btn btn-danger waves-effect btnEditUser" data-user-id="1"><i class="zmdi zmdi-edit"></i> Edit</button></td>
                                            </tr>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Product List -->
                            <br>
                        </div>
                        
                        <br>
                    </div>
                        <!-- end Page Content here -->
                    </div>
                </div>
            </section><!--end main body-->
       