<div class="table-responsive" id="slft2">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="3">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
      <table class="table table-striped-columns" 
        >
        <thead align="center">
          <tr>
            <th colspan="19" scope="col"><?php echo nl2br("FINAL TEST")?></th>
          </tr>
        </thead>
        <thead align="center">
          <tr>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="12" scope="col" >Failure Item</th>
          </tr>
        
          <tr>            
            <th class="input-form"  rowspan="3">Input</th>
            <th class="input-form"  rowspan="3">Output</th>
            <th class="input-form"  rowspan="3">Reject</th> 
            <th class="input-form"  rowspan="3">Yield</th>
            <th class="input-form"  >LD.lr/ LDlr.Err <br> (00)</th>
            <th class="input-form"  >lop.Err <br> (01)</th>
            <th class="input-form"  >lop/ Plop <br> (02)</th>
            <th class="input-form"  >lth <br> (03)</th>
            <th class="input-form"  >Klnk <br> (04)</th>
            <th class="input-form"  >Vop <br> (05)</th>
            <th class="input-form"  >Open <br> (06)</th>
            <th class="input-form"  >lmop <br> (07)</th>
            <th class="input-form"  >Rph2 <br> (08)</th>
            <th class="input-form"  >Lp <br> (09)</th>
            <th class="input-form"  >Thh <br> (0A)</th>
            <th class="input-form"  >Thv <br> (0B)</th>
          </tr>
        
        <tr>                
            <th class="input-form" scope="col">Phh <br> (0C)</th>
            <th class="input-form" scope="col">Phv <br> (0D)</th>
            <th class="input-form" scope="col">Ripple <br> (0E)</th>
            <th class="input-form" scope="col">LDs.Err <br> (0F)</th>
            <th class="input-form" scope="col">Axis_diff <br> (10)</th>
            <th class="input-form" scope="col">Eta/ PEta <br> (11)</th>
            <th class="input-form" scope="col">Plop. Err <br> (12)</th>
            <th class="input-form" scope="col">Vnr1/Vnr2 <br> (13)</th>
            <th class="input-form" scope="col">lf.LD <br> (14)</th>
            <th class="input-form" scope="col">Vim <br> (15)</th>
            <th class="input-form" scope="col">Pulse <br> (16)</th>
            <th class="input-form" scope="col">Rdl/ RdPo <br> (17)</th>
        </tr>
        <tr>  
            <th class="input-form" scope="col">LD Leak <br> (18)</th>
            <th class="input-form" scope="col">Pol/ PhPl <br> (19)</th>
            <th class="input-form" scope="col">Ub/FPH.Err/ FPV.Err <br> (1A)</th>
            <th class="input-form" scope="col">λ. Err <br> (1B)</th>
            <th class="input-form" scope="col">Pol. Err <br> (1C)</th>
            <th class="input-form" scope="col">Kink3 <br> (1D)</th>
            <th class="input-form" scope="col">mKink/lm.Er/ ldk/Pl.E/ IPD <br> (1E)</th>
            <th class="input-form" scope="col">Pth <br> (1F)</th>
            <th class="input-form" scope="col">Others</th>
            <th class="input-form" scope="col">RANK 2</th>
            <th class="input-form" scope="col">RANK 3</th>
            <th class="input-form" scope="col">Sampling</th>
        </tr>

        </thead>
        <tbody>
            <td rowspan="1" >
              <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
            </td>
            <td rowspan="1" >
              <input type="number"   oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
            </td>
            <td rowspan="2" >
              <input type="number" step="1"class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
            </td>
            <td rowspan="2" >
              <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par017a" name="par017a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par017b" name="par017b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par017c" name="par017c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par017'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par018c" name="par018c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par018'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par019c" name="par019c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par019'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par020c" name="par020c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par020'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par021c" name="par021c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par021'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par022c" name="par022c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par022'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par023c" name="par023c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par023'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par024c" name="par024c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par024'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par025b" name="par025b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par025c" name="par025c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par025'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par026b" name="par026b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par026c" name="par026c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par026'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par027a" name="par027a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par027b" name="par027b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par027'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par027c" name="par027c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par027'];} ?>>
            </td>
            <td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par028a" name="par028a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par028b" name="par028b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par028'];} ?>>
            </td<td rowspan="3" >
              <input type="number" step="0.00000001"class="form-control" id="par028c" name="par028c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par028'];} ?>>
            </td>
        </tbody>
    </table>
</div>