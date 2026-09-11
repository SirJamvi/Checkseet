<div class="table-responsive" id="sl38-p-ht">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="3">
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
                <th class="input-form" colspan="4" scope="col" >Quantity</th>
                <th class="input-form" colspan="13" scope="col" >Failure Item</th>
              </tr>

              <tr>
                <th class="input-form" rowspan="3" >Input</th>
                <th class="input-form" rowspan="3" >Output</th>
                <th class="input-form" rowspan="3" >Reject</th>
                <th class="input-form" rowspan="3" >Yield (%)</th>
                <th class="input-form"  >LDs.Err (01)</th>
                <th class="input-form"  >LDo.Err (02)</th>
                <th class="input-form"  >lop.Err / Plop.Err (03)</th>
                <th class="input-form"  >Kink.Err (04)</th>
                <th class="input-form"  >SP1.Err / SP2.Err (05)</th>
                <th class="input-form"  >LDlr.Err (06)</th>
                <th class="input-form"  >Tlop.Err (07)</th>
                <th class="input-form"  >TKink.Err (08)</th>
                <th class="input-form"  >TSP1.Err / TSP2.Err (09)</th>
                <th class="input-form"  >lf LD (11)</th>
                <th class="input-form"  >LD.lr (12)</th>
                <th class="input-form"  >RdPo/ Rdl (13)</th>
                <th class="input-form"  >Vop1/Vop2 (14)</th>
              </tr>

            <tr>              
                <th class="input-form" scope="col">lop1/lop2 (15)</th>
                <th class="input-form" scope="col">lth (16)</th>
                <th class="input-form" scope="col">Eta0/1/2 (17)</th>
                <th class="input-form" scope="col">L.Kink1-4 (18)</th>
                <th class="input-form" scope="col">Pmax/ Ppmax (19)</th>
                <th class="input-form" scope="col">Tith (1a)</th>
                <th class="input-form" scope="col">TEta0/1/2 (1B)</th>
                <th class="input-form" scope="col">TLKink1-4 (1C)</th>
                <th class="input-form" scope="col">lmax/ Pimax (20)</th>
                <th class="input-form" scope="col">Tipnt (21)</th>
                <th class="input-form" scope="col">TLp (22)</th>
                <th class="input-form" scope="col">Wop1 (26)</th>
                <th class="input-form" scope="col">Wop2 (27)</th>
            </tr>

            <tr>
                <th class="input-form" scope="col">TWop1 (28)</th>
                <th class="input-form" scope="col">Twop2 (29)</th>
                <th class="input-form" scope="col">Lp (2A)</th>
                <th class="input-form" scope="col">TVop1/ TVop2 (2B)</th>
                <th class="input-form" scope="col">Tlop1/Tlop2 (2C)</th>
                <th class="input-form" scope="col">Tpmax (2D)</th>
                <th class="input-form" scope="col">Tlmax (2E)</th>
                <th class="input-form" scope="col">dLp(P1)_1 (2F)</th>
                <th class="input-form" scope="col">Rank 2</th>
                <th class="input-form" scope="col">Rank 3</th>
                <th class="input-form" scope="col">Other</th>
                <th class="input-form" scope="col"></th>
                <th class="input-form" scope="col"></th>
            </tr>

            </thead>
            <tbody>
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
                </td>
                <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par017a" name="par017a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par017b" name="par017b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par017c" name="par017c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par017'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par018c" name="par018c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par018'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par019c" name="par019c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par019'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par020c" name="par020c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par020'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par021c" name="par021c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par021'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par022c" name="par022c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par022'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par023c" name="par023c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par023'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par024c" name="par024c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par024'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par025b" name="par025b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par025c" name="par025c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par025'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par026b" name="par026b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par026c" name="par026c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par026'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par027a" name="par027a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par027b" name="par027b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par027'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par027c" name="par027c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par027'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par028a" name="par028a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par028b" name="par028b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par028'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par028c" name="par028c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par028'];} ?>>
                </td> <td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par029a" name="par029a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par029b" name="par029b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par029'];} ?>>
                </td<td rowspan="2" >
                  <input type="number" step="0.00000001"class="form-control" id="par029c" name="par029c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par029'];} ?>>
                </td>
            </tbody>
          </table>
        </div>