<div class="table-responsive" id="slft">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="4">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
      <table class="table table-striped-columns" 
        >
        <thead align="center">
          <tr>
            <th colspan="19" scope="col"><?php echo nl2br("FINAL TEST \n (Blue Laser/ Green Laser/ Violet/ Cyan Laser)")?></th>
          </tr>
        </thead>
        <thead align="center">
          <tr>
            <th class="input-form" colspan="4" scope="col">Quantity</th>
            <th class="input-form" colspan="14" scope="col" >Failure Item</th>
          </tr>
        
          <tr>            
            <th class="input-form"  rowspan="4">Input</th>
            <th class="input-form"  rowspan="4">Output</th>
            <th class="input-form"  rowspan="4">Reject</th> 
            <th class="input-form"  rowspan="4">Yield</th>
            <th class="input-form"  >lmop <br> (00)</th>
            <th class="input-form"  >lf.LD <br> (01)</th>
            <th class="input-form"  >LD.Ir <br> (02)</th>
            <th class="input-form"  >Vop <br> (03)</th>
            <th class="input-form"  >lop <br> (04)</th>
            <th class="input-form"  >lth <br> (05)</th>
            <th class="input-form"  >Eta <br> (06)</th>
            <th class="input-form"  >L.Kink2 <br> (07)</th>
            <th class="input-form"  >Pmax <br> (08)</th>
            <th class="input-form"  >Imax<br> (09)</th>
            <th class="input-form"  >Pol <br> (0A)</th>
            <th class="input-form"  >PhPI <br> (0B)</th>
            <th class="input-form"  >Thv <br> (0C)</th>
            <th class="input-form"  >Thh <br> (0D)</th>
          </tr>
        
        <tr>                
            <th class="input-form" scope="col">Phv <br> (0E)</th>
            <th class="input-form" scope="col">Phh <br> (0F)</th>
            <th class="input-form" scope="col">Rpv <br> (10)</th>
            <th class="input-form" scope="col">Rph <br> (11)</th>
            <th class="input-form" scope="col">Lp <br> (12)</th>
            <th class="input-form" scope="col">LD Short <br> (13)</th>
            <th class="input-form" scope="col">LD Open <br> (14)</th>
            <th class="input-form" scope="col">lop. Err <br> (15)</th>
            <th class="input-form" scope="col">Kink.Err <br> (16)</th>
            <th class="input-form" scope="col">Pol.Err <br> (17)</th>
            <th class="input-form" scope="col">FFV.Err <br> (18)</th>
            <th class="input-form" scope="col">FFh.Err <br> (19)</th>
            <th class="input-form" scope="col">SP.Err <br> (1A)</th>
            <th class="input-form" scope="col">LDIr.Err <br> (1B)</th>
        </tr>
        <tr>  
            <th class="input-form" scope="col">lm.Err/ Vnr/ ldark/ lfPD/ m.Kink/PDIr.Err <br> (1C)</th>
            <th class="input-form" scope="col">L.Kink3 <br> (1D)</th>
            <th class="input-form" scope="col">L.Kink4 <br> (1E)</th>
            <th class="input-form" scope="col">RdPo <br> (1F)</th>
            <th class="input-form" scope="col">CP(lmax) <br> (20)</th>
            <th class="input-form" scope="col">HPlop1 <br> (21)</th>
            <th class="input-form" scope="col">HPlop 2,3 <br> (22)</th>
            <th class="input-form" scope="col">HPEta <br> (23)</th>
            <th class="input-form" scope="col">L.kink1 <br> (24)</th>
            <th class="input-form" scope="col">HPKink 1,2 <br> (25)</th>
            <th class="input-form" scope="col">HPKink3 <br> (26)</th>
            <th class="input-form" scope="col">*Thv <br> (27)</th>
            <th class="input-form" scope="col">*Thh <br> (28)</th>
            <th class="input-form" scope="col">*Phv <br> (29)</th>
        </tr>

        <tr>  
            <th class="input-form" scope="col">*Phh <br> (2A)</th>
            <th class="input-form" scope="col">Clop. Err <br> (2B)</th>
            <th class="input-form" scope="col">HPlop. Err <br> (2C)</th>
            <th class="input-form" scope="col">Ckink. Err <br> (2D)</th>
            <th class="input-form" scope="col">HHPkink. Err <br> (2E)</th>
            <th class="input-form" scope="col"> </th>
            <th class="input-form" scope="col">Others </th>
            <th class="input-form" scope="col">RANK 2</th>
            <th class="input-form" scope="col">RANK 3</th>
            <th class="input-form" scope="col">RANK 4</th>
            <th class="input-form" scope="col">RANK 5</th>
            <th class="input-form" scope="col"> </th>
            <th class="input-form" scope="col"> </th>
            <th class="input-form" scope="col"> </th>
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
              <input type="number" step="1" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
            </td>
            <td rowspan="2" >
              <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par017a" name="par017a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par017b" name="par017b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par017c" name="par017c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par017'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par017d" name="par017d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par017'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par018c" name="par018c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par018'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par018d" name="par018d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par018'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par019c" name="par019c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par019'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par019d" name="par019d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par019'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par020c" name="par020c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par020'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par020d" name="par020d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par020'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par021c" name="par021c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par021'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par021d" name="par021d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par021'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par022c" name="par022c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par022'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par022d" name="par022d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par022'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par023c" name="par023c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par023'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par023d" name="par023d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par023'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par024c" name="par024c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par024'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par024d" name="par024d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par024'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par025b" name="par025b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par025c" name="par025c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par025'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par025d" name="par025d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par025'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par026b" name="par026b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par026c" name="par026c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par026'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par026d" name="par026d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par026'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par027a" name="par027a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par027b" name="par027b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par027'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par027c" name="par027c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par027'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par027d" name="par027d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par027'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par028a" name="par028a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par028b" name="par028b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par028'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par028c" name="par028c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par028'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par028d" name="par028d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par028'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par029a" name="par029a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par029b" name="par029b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par029'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par029c" name="par029c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par029'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par029d" name="par029d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par029'];} ?>>
            </td>
            <td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par030a" name="par030a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par030b" name="par030b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par030'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par030c" name="par030c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par030'];} ?>>
            </td<td rowspan="4" >
              <input type="number" step="0.00000001" class="form-control" id="par030d" name="par030d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par030'];} ?>>
            </td>
        </tbody>
    </table>
</div>