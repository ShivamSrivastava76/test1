<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

     
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <?php $response = json_decode($response)->fields;?>
        <div class="card-body my-3">
            <div class="container my-3">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <form method="post" action="<?php echo e(url('/public/save')); ?>">
                   <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>">
                   <?php for($i=0; $i<count($response); $i++): ?>
                       <?php if(isset($response[$i]->items)): ?>
                            <?php if($response[$i]->type == "dropdown"): ?>
                                <div class="mb-3">
                                    <label for="<?php echo e($response[$i]->key); ?>" name="<?php echo e($response[$i]->key); ?>"  class="form-label"><?php echo e($response[$i]->label); ?></label>
                                    <select class="form-select" name="<?php echo e($response[$i]->key); ?>" id="<?php echo e($response[$i]->key); ?>" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php for($j=0; $j<count($response[$i]->items); $j++): ?>
                                         <option value="<?php echo e($response[$i]->items[$j]->value); ?>"><?php echo e($response[$i]->items[$j]->text); ?></option>
                                        <?php endfor; ?>
                                       
                                    </select>
                            <?php endif; ?>
                       <?php else: ?>
                            <div class="mb-3">
                              <label for="<?php echo e($response[$i]->key); ?>" class="form-label"><?php echo e($response[$i]->label); ?></label>
                              <input type="<?php echo e($response[$i]->type); ?>" class="form-control" id="<?php echo e($response[$i]->key); ?>" name="<?php echo e($response[$i]->key); ?>" placeholder="<?php echo e($response[$i]->label); ?> (<?php if(isset($response[$i]->unit)): ?><?php echo e($response[$i]->unit); ?><?php endif; ?>)" title="<?php echo e($response[$i]->label); ?>"  <?php if(isset($response[$i]->isRequired)): ?> <?php if($response[$i]->isRequired): ?> required <?php endif; ?> <?php endif; ?>  <?php if(isset($response[$i]->isReadonly)): ?> <?php if($response[$i]->isReadonly): ?> readonly <?php endif; ?> <?php endif; ?>>
                            </div>
                       <?php endif; ?>
                    <?php endfor; ?>
                    <center>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </center>
              </form>
            </div>
        </div>
        <?php if(count($data) != 0): ?>
            <div class="card-body my-3">
                <div class="container my-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">So.No.</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Gestational Age(Weeks)</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Height(cm)</th>
                                <th scope="col">Weight(Kg)</th>
                                <th scope="col">BMI(kg/m<sup>3</sup>)</th>
                            </tr>
                        </thead>
                         <tbody>
                             <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($val->id); ?></th>
                                    <td><?php echo e($val->DOB); ?></td>
                                    <td><?php echo e($val->Age); ?></td>
                                    <td><?php echo e($val->Sex); ?></td>
                                    <td><?php echo e($val->Height); ?></td>
                                    <td><?php echo e($val->Weight); ?></td>
                                    <td><?php echo e($val->BMI); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                         
                    </table>
                    
                        <?php echo e($data->links()); ?>

                        
                </div>
            </div>
        <?php endif; ?>
    </body>
</html>
<?php /**PATH /home/opzdvjfzvul0/public_html/test.shivamitsolution.in/resources/views/welcome.blade.php ENDPATH**/ ?>