<div class="table-responsive" id="slht">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
          <table class="table table-striped-columns" 
            >
            <thead align="center">
              <tr>
                <th colspan="19" scope="col"><?php echo nl2br("HOT TEST")?></th>
              </tr>
            </thead>
            <thead align="center">
              <tr>
                <th class="input-form" rowspan="3" >HT1/HT2</th>
                <th class="input-form" colspan="4" scope="col" >Quantity</th>
                <th class="input-form" colspan="13" scope="col" >Failure Item</th>
              </tr>

              <tr>
                <th class="input-form" rowspan="4" >Input</th>
                <th class="input-form" rowspan="4" >Output</th>
                <th class="input-form" rowspan="4" >Reject</th>
                <th class="input-form" rowspan="4" >Yield (%)</th>
                <th class="input-form"  >LDs.Err (01)</th>
                <th class="input-form"  >LDo.Err (02)</th>
                <th class="input-form"  >lop.Err (03)</th>
                <th class="input-form"  >Kink.Err (04)</th>
                <th class="input-form"  >SP1.Err (05)</th>
                <th class="input-form"  >LDIr.Err (06)</th>
                <th class="input-form"  >TLop.Err (07)</th>
                <th class="input-form"  >lf LD (11)</th>
                <th class="input-form"  >LD.lr (12)</th>
                <th class="input-form"  >Vop2 (14)</th>
                <th class="input-form"  >lop2 (15)</th>
                <th class="input-form"  >lth (16)</th>
                <th class="input-form"  >Eta2 (17)</th>
              </tr>

            <tr>              
                <th class="input-form" scope="col">LKink2 (18)</th>
                <th class="input-form" scope="col">Pmax (19)</th>
                <th class="input-form" scope="col">lmax (20)</th>
                <th class="input-form" scope="col">Wop2 (27)</th>
                <th class="input-form" scope="col">Lp <br> (2A)</th>
                <th class="input-form" scope="col">TVop2 (2B)</th>
                <th class="input-form" scope="col">Tlop2 (2C)</th>
                <th class="input-form" scope="col">TPmax (2D)</th>
                <th class="input-form" scope="col">Tlmax (2E)</th>
                <th class="input-form" scope="col">Rank <br> 2</th>
                <th class="input-form" scope="col">Rank 3</th>
                <th class="input-form" scope="col">Others</th>
                <th class="input-form" scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <td rowspan="2" >
                    <select id="par002" name="par002" class="form-select">
                    <?php if(isset($alldata)){
                      if($alldata[0]["par002"]=="-"){
                        echo '
                          <option value="-" selected>-</option>
                          <option value="HT">HT</option>
                          <option value="HT1">HT1</option>
                          <option value="HT2">HT2</option>
                        ';
                      }
                      else if($alldata[0]["par002"]=="HT")
                      {
                        echo '
                          <option value="-">-</option>
                          <option value="HT" selected>HT</option>
                          <option value="HT1">HT1</option>
                          <option value="HT2">HT2</option>
                        ';
                      }
                      else if($alldata[0]["par002"]=="HT1")
                      {
                        echo '
                          <option value="-">-</option>
                          <option value="HT">HT</option>
                          <option value="HT1" selected>HT1</option>
                          <option value="HT2">HT2</option>
                        ';
                      }
                      else{
                        echo '
                          <option value="-">-</option>
                          <option value="HT">HT</option>
                          <option value="HT1">HT1</option>
                          <option value="HT2" selected>HT2</option>
                        ';
                      }
                    }
                    else{
                      echo '
                          <option value="-">-</option>
                          <option value="HT">HT</option>
                          <option value="HT1">HT1</option>
                          <option value="HT2">HT2</option>
                      ';
                    } ?>
                    </select>
                </td>
                <td rowspan="1" >
                  <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
                </td>
                <td rowspan="2" >
                  <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
                </td>
                 <td rowspan="2" >
                  <input type="number" step="1"class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
                </td>
                <td rowspan="2" >
                  <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par017a" name="par017a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par017b" name="par017b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par025b" name="par025b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par026b" name="par026b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par027a" name="par027a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par027b" name="par027b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par027'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par028a" name="par028a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par028b" name="par028b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par028'];} ?>>
                </td><td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par029a" name="par029a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par029b" name="par029b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par029'];} ?>>
                </td> 
            </tbody>
          </table>
        </div>