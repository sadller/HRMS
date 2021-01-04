<?php

        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $uname=$_GET['uname'];
        $period=$_GET['period'];
        $wrk_days=$_GET['wrk_days'];
        $leaves=$_GET['leaves'];
        $query = "select * from emp_info where uname='$uname'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            
            $row = mysqli_fetch_assoc($result);
            
            $empid=$row['empid'];
            $fullname = $row['title']." ".$row['fname']." ".$row['lname'];
            $uname=$row['uname'];
            $email=$row['email'];
            $doj=$row['doj'];
            $type=$row['type'];
            $basic=$row['basic'].".00";
            $hra=$row['hra'].".00";
            $conveyance=$row['conveyance'].".00";
            $medical=$row['medical'].".00";
            $special=$row['special'].".00";
            $provident=$row['provident'].".00";
            $bankname=$row['bankname'];
            $account=$row['account'];
            $pan=$row['pan'];
         }
    $empid = "EMP".substr($doj,2,2).$row['empid'];
    $tds = "0.00";
    $leave_ded = round($leaves*($basic/31),2);
    $TE = round($basic+$hra+$medical+$conveyance+$special,2);
    $TD = round($provident+$leave_ded,2);
    $net_pay = round($TE-$TD,2);



    require("../fpdf/fpdf.php");
    $pdf = new FPDF();

    $pdf->AddPage('P');
    
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,10,$fullname,0,1,'L');
  
    $pdf->Cell(0,8,"",0,1,'L');
    $pdf->SetTextColor(250,0,0);
    $pdf->SetFont("Times","B",14);
    $pdf->Cell(0,8,$period,1,1,'R');
    
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont("Arial","",12);
        
    $pdf->Cell(0,8,"",0,1,'L');
   

    $pdf->Cell(50,8,"Employee ID",1,0,'L');
    $pdf->Cell(45,8,$empid,1,0,'L');
    $pdf->Cell(50,8,"PAN no.",1,0,'L');
    $pdf->Cell(45,8,$pan,1,1,'L');

    $pdf->Cell(50,8,"Username",1,0,'L');
    $pdf->Cell(45,8,$uname,1,0,'L');
    $pdf->Cell(50,8,"No. of working days",1,0,'L');
    $pdf->Cell(45,8,$wrk_days,1,1,'L');

    $pdf->Cell(50,8,"Date of Joining",1,0,'L');
    $pdf->Cell(45,8,$doj,1,0,'L');
    $pdf->Cell(50,8,"No. of leaves taken",1,0,'L');
    $pdf->Cell(45,8,$leaves,1,1,'L');

    $pdf->Cell(50,8,"Bank name",1,0,'L');
    $pdf->Cell(45,8,$bankname,1,0,'L');
    $pdf->Cell(50,8,"",1,0,'L');
    $pdf->Cell(45,8,"",1,1,'L');

    $pdf->Cell(50,8,"Account no.",1,0,'L');
    $pdf->Cell(45,8,$account,1,0,'L');
    $pdf->Cell(50,8,"",1,0,'L');
    $pdf->Cell(45,8,"",1,1,'L');

    $pdf->Cell(0,10,"",0,1,'L');
    
    $pdf->SetFont("Arial","B",12);
    $pdf->Cell(95,8,"Total Earnings",1,0,'L');
    $pdf->Cell(95,8,"Total Deductions",1,1,'L');
  
    $pdf->Cell(95,8,"",1,0,'L');
    $pdf->Cell(95,8,"",1,1,'L');

    $pdf->SetFont("Arial",'',12);
    $pdf->Cell(50,8,"Basic",1,0,'L');
    $pdf->Cell(45,8,$basic,1,0,'L');
    $pdf->Cell(50,8,"TDS",1,0,'L');
    $pdf->Cell(45,8,$tds,1,1,'L');

    $pdf->Cell(50,8,"HRA",1,0,'L');
    $pdf->Cell(45,8,$hra,1,0,'L');
    $pdf->Cell(50,8,"Provident",1,0,'L');
    $pdf->Cell(45,8,$provident,1,1,'L');

    $pdf->Cell(50,8,"Conveyance",1,0,'L');
    $pdf->Cell(45,8,$conveyance,1,0,'L');
    $pdf->Cell(50,8,"Leave Deductions",1,0,'L');
    $pdf->Cell(45,8,$leave_ded,1,1,'L');

    $pdf->Cell(50,8,"Medical",1,0,'L');
    $pdf->Cell(45,8,$medical,1,0,'L');
    $pdf->Cell(50,8,"Other Deductions",1,0,'L');
    $pdf->Cell(45,8,"0.00",1,1,'L');

    $pdf->Cell(50,8,"Special",1,0,'L');
    $pdf->Cell(45,8,$special,1,0,'L');
    $pdf->Cell(50,8,"Security Deposit",1,0,'L');
    $pdf->Cell(45,8,"0.00",1,1,'L');

    $pdf->Cell(50,8,"Bonus/Increment",1,0,'L');
    $pdf->Cell(45,8,"0.00",1,0,'L');
    $pdf->Cell(95,8,"",1,1,'L');
    
    $pdf->Cell(50,8,"Education Allowance",1,0,'L');
    $pdf->Cell(45,8,"0.00",1,0,'L');
    $pdf->Cell(95,8,"",1,1,'L');

    $pdf->Cell(95,8,"",1,0,'L');
    $pdf->Cell(95,8,"",1,1,'L');
  
    $pdf->SetFont("Arial","B",12);
    $pdf->Cell(50,8,"Total (Gross Salary)",1,0,'L');
    $pdf->Cell(45,8,$TE,1,0,'L');
    $pdf->Cell(50,8,"Total Deductions",1,0,'L');
    $pdf->Cell(45,8,$TD,1,1,'L');

    $pdf->Cell(0,10,"",0,1,'L');
    $pdf->SetTextColor(0,0,200);
    $pdf->SetFont("Arial","B",14);
    $pdf->Cell(50,8,"Net Pay",1,0,'L');
    $pdf->Cell(45,8,$net_pay,1,0,'L');


    $pdf->output();


?>