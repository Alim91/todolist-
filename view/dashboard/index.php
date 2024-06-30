<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i
                            class="fa fa-tasks"></i>&nbsp;Task List
                    </div>

                </div>
                <div class="scroll-area-sm">
                    <perfect-scrollbar class="ps-show-limits">
                        <div style="position: static;" class="ps ps--active-y">
                            <div class="ps-content">
                                <ul class=" list-group list-group-flush">
                                    <?php
                                    $tasks = GetAllTask();
                                    foreach ($tasks as $task) : ?>
                                        <?php $taskStatus = $task["status"]; ?>
                                        <?php $taskClass = ""; ?>
                                        <?php switch ($taskStatus):
                                            case "Todo":
                                                $taskClass = "info";
                                                break;
                                            case "Doing":
                                                $taskClass = "primary";
                                                break;
                                            case "Done":
                                                $taskClass = "success";
                                                break;
                                        endswitch; ?>
                                        <li class="list-group-item">
                                            <div class="todo-indicator bg-<?php echo $taskClass; ?>"></div>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-2">
                                                        <div class="custom-checkbox custom-control">
                                                            <input class="custom-control-input"
                                                                   id="exampleCustomCheckbox12"
                                                                   type="checkbox"><label
                                                                class="custom-control-label"
                                                                for="exampleCustomCheckbox12">&nbsp;</label>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">
                                                            <?php echo $task["title"]; ?>
                                                            <div class="badge badge-<?php echo $taskClass; ?> ml-2"><?php echo $taskStatus; ?></div>
                                                            <div class=" ml-2"><?php echo $task["username"]; ?></div>
                                                        </div>
                                                        <!--                                                        <div class="widget-subheading"><i>By Bob</i></div>-->
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <a href="?id=<?php echo $task["id"]; ?>&action=update&status=Doing"
                                                           class="border-0 btn-transition btn btn-outline-primary">
                                                            <i class="fa fa-clock-o"></i>
                                                        </a>
                                                        <a href="?id=<?php echo $task["id"]; ?>&action=update&status=Done"
                                                           class="border-0 btn-transition btn btn-outline-success">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <a href="?id=<?php echo $task["id"]; ?>&action=delete"
                                                           class="border-0 btn-transition btn btn-outline-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>
                    </perfect-scrollbar>

                </div>
                <div class="d-block text-right card-footer">
                    <form name="" action="" method="post">
                        <input name="taskTitle" placeholder="Enter Your Title Task" value="" id="" class="jataski"/>

                        <select id="items" name="items">
                            <?php
                            $users = GetAllUser();
                            foreach ($users as $user) : ?>
                                <option value=<?php echo $user["id"]; ?>><?php echo $user["username"] ?></option>
                            <?php endforeach; ?>

                        </select>
                        <button name="createTask" value="submit" type="submit" class="btn btn-primary">Add Task
                        </button>

                        <!--                        </div>-->

                </div>

            </div>
        </div>
        <div class="col-md-5">
            <div class="user-table">
                <h2>User Information</h2>

                <?php $currentUser = GetUser($_SESSION["userId"]);?>
                <table>
                    <tbody>

                    <tr>
                        <th>Username</th>
                        <td><?php echo $currentUser["username"]; ?> </td>
                    </tr>
                    <tr>
                        <th>IP Address</th>
                        <td><?php echo $currentUser["ip_address"]; ?></td>
                    </tr>
                    <tr>
                        <th>Last Login</th>
                        <td><?php echo $currentUser["lastlogin"]; ?></td>
                    </tr>

                    </tbody>
                </table>
                <a style="padding: 15px !important;display: block;font-size: 16px" href="?logout=true">Logout</a>
                </div>

        </div>
        <div class="col-md-7">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i
                            class="fa fa-tasks"></i>&nbsp;Users
                    </div>

                </div>
                <div class="scroll-area-sm">
                    <perfect-scrollbar class="ps-show-limits">
                        <div style="position: static;" class="ps ps--active-y">
                            <div class="ps-content">
                                <ul class=" list-group list-group-flush">
                                    <?php
                                    $users = GetAllUser();
                                    foreach ($users as $user) : ?>

                                        <li class="list-group-item">
                                            <P><?php echo $user["username"] ?></P>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>
                    </perfect-scrollbar>
                </div>
<!--                <div class="d-block text-right card-footer">-->
<!--                    <form name="" action="" method="post">-->
<!--                        <input name="userTitle" placeholder="Enter Username" value="" id="" class="jataski"/>-->
<!--                        <button name="createUser" value="submit" type="submit" class="btn btn-primary">Add User-->
<!--                        </button>-->
<!---->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>