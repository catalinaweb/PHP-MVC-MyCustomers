<?php
include "header.php";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://www.transsped.ro" target="_blank">
        <img src="https://www.transsped.ro/images/logo_color.png" alt="Trans Sped logo" style="height:60px;margin:20px 0 20px 0;">
    </a>
</nav>  

<div class="container">

    <div class="row">
        <div class="col-xl-4 offset-xl-4">
            <form action="/customers/addcustomers" method="post">
                <div class="form-group">
                    <label for="name">Customer name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="birthday">Date of birth</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <label for="phone">Phone number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                    <label for="organization">Organization name</label>
                    <input type="text" class="form-control" id="organization" name="organization">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

    <div class="row my-4">
        <table class="table table-sm">
            <thead>
                <tr>                    
                    <th scope="col">Customer name</th>
                    <th class="text-center" scope="col">Details</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['allcustomers'] as $customer): ?>
                    <tr>

                        <td><?php echo $customer->customer_name; ?></td>
                        <td class="text-center"><i class="fa fa-info" aria-hidden="true" data-toggle="modal" data-target="#customer<?php echo $customer->id_customer; ?>"></i>
                            <div class="modal fade" id="customer<?php echo $customer->id_customer; ?>" tabindex="-1" role="dialog" aria-labelledby="customerLabel<?php echo $customer->id_customer; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="customerLabel<?php echo $customer->id_customer; ?>">Details: <?php echo $customer->customer_name; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Date of birth:</strong> <?php echo $customer->date_of_birth; ?></p>       
                                            <p><strong>Address:</strong> <?php echo $customer->address; ?></p>    
                                            <p><strong>Email:</strong> <?php echo $customer->email; ?></p> 
                                            <p><strong>Phone number:</strong> <?php echo $customer->phone_number; ?></p> 
                                            <p><strong>Organization name:</strong> <?php echo $customer->organization_name; ?></p>
                                            <p><strong>Notes:</strong> <?php echo $customer->notes; ?></p>

                                        </div> 

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div></td>
                        <td class="text-center"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#update<?php echo $customer->id_customer; ?>"></i>
                            <div class="modal fade" id="update<?php echo $customer->id_customer; ?>" tabindex="-1" role="dialog" aria-labelledby="updateLabel<?php echo $customer->id_customer; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateLabel<?php echo $customer->id_customer; ?>">Details: <?php echo $customer->customer_name; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="customers/updatecustomer/" method="post">
                                                <div class="form-group">
                                                    <label for="name">Customer name</label>
                                                    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $customer->customer_name; ?>">
                                                    <input type="hidden" value="<?php echo $customer->id_customer; ?>" name="id_customer">
                                                    <label for="birthday">Date of birth</label>
                                                    <input type="text" class="form-control" id="birthday" name="birthday" required value="<?php echo $customer->date_of_birth; ?>">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" required value="<?php echo $customer->address; ?>">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" required value="<?php echo $customer->email; ?>">
                                                    <label for="phone">Phone number</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" required value="<?php echo $customer->phone_number; ?>">
                                                    <label for="organization">Organization name</label>
                                                    <input type="text" class="form-control" id="organization" name="organization" value="<?php echo $customer->organization_name; ?>">
                                                    <label for="notes">Notes</label>
                                                    <textarea class="form-control" id="notes" name="notes" rows="2"><?php echo $customer->notes; ?></textarea>

                                                </div> 

                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div></td>
                        <td class="text-center"><a href="customers/deletecustomer/<?php echo $customer->id_customer; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>    
</div> 
