<?php
if ($_SESSION['login_rank'] == 'System Admin') {
?>
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="officers" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user"></i>
                        <span class="nav-text">Clinical Officers</span>
                    </a>
                </li>
                <li>
                    <a href="donors" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-add-3"></i>
                        <span class="nav-text">Donors</span>
                    </a>
                </li>
                <li>
                    <a href="patients" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="banks" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Blood Banks</span>
                    </a>
                </li>
                <li>
                    <a href="donations" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-heart"></i>
                        <span class="nav-text">Donations</span>
                    </a>
                </li>
                <li>
                    <a href="transfusions" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-controls-3"></i>
                        <span class="nav-text">Transfusions</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-layer-1"></i>
                        <span class="nav-text">Advanced Reports</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="reports_donors">Donors</a></li>
                        <li><a href="reports_officers">Officers</a></li>
                        <li><a href="reports_patients">Patients</a></li>
                        <li><a href="reports_blood_donations">Blood Donations</a></li>
                        <li><a href="reports_transfussions">Transfussions</a></li>
                        <li><a href="reports_banks">Blood Banks</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php } else if ($_SESSION['login_rank'] == 'Clinical Officer') { ?>
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="donors" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-add-3"></i>
                        <span class="nav-text">Donors</span>
                    </a>
                </li>
                <li>
                    <a href="patients" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="banks" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Blood Banks</span>
                    </a>
                </li>
                <li>
                    <a href="donations" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-heart"></i>
                        <span class="nav-text">Donations</span>
                    </a>
                </li>
                <li>
                    <a href="transfusions" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-controls-3"></i>
                        <span class="nav-text">Transfusions</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-layer-1"></i>
                        <span class="nav-text">Advanced Reports</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="reports_donors">Donors</a></li>
                        <li><a href="reports_officers">Officers</a></li>
                        <li><a href="reports_patients">Patients</a></li>
                        <li><a href="reports_blood_donations">Blood Donations</a></li>
                        <li><a href="reports_transfussions">Transfussions</a></li>
                        <li><a href="reports_banks">Blood Banks</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php } else if ($_SESSION['login_rank'] == 'Donor') { ?>
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="donations" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-heart"></i>
                        <span class="nav-text">My Donations</span>
                    </a>
                </li>
                <li>
                    <a href="my_profile" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">My Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php } else if ($_SESSION['login_rank'] == 'Patient') { ?>
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="transfusions" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-controls-3"></i>
                        <span class="nav-text">Transfusions</span>
                    </a>
                </li>

                <li>
                    <a href="my_profile" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">My Profile</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
<?php } ?>