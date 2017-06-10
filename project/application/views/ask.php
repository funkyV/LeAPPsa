<div id="site_content">

        <div id="content">
        <h1 class="center" style="">Porneste Leapsa!</h1>
        <br/>
        <form action="ask/askQuestion" method="POST" class="center" style="width:400px;margin:0 auto;">
                <label name = "question_types"> Question Types </label>
                <br/>
                <input list="question-types" name="question_types">
                        <datalist id="question-types" multiple>
                                <option value="Type1">
                                <option value="Type2">
                                <option value="Type3">
                                <option value="Type4">
                                <option value="Type5">
                        </datalist>
                </input>
                <br/>
                <label name = "question"> Intrebarea </label>
                <br />
                <input type="text" id="question" name="question">
                <br/>
                
                        
                <select style="width:200px; height:100px; text-align:center" name="emails[]" multiple>
                        <?php foreach ($this->emailList as $email) {
                                echo '<option value="' . $email['email'] . '">' . $email['email'] . '</option>';
                        }
                        ?>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                </select>
                <br/>
                <input type="submit" value="Start Leapsa" style="width:150px">
         </form>
        </div>
</div>
