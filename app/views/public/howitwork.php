
 <div id="how_to_work">
    <section class="white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary text-uppercase">Joining Kit</h3>
                    <span class="line-sep-blue"></span>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Serial No.</th>
                                <th>Gift For You</th>
                                <th>M.R.P.</th>
                            </tr>
                            <tr v-for="(kit,index) in joiningList">
                                <th>{{index+1}}</th>
                                <td>{{kit.gift_for_you}}</td>
                                <td>{{kit.mrp}}/-</td>
                            </tr>
                            <tr>
                                <!-- <td></td>
                                <th>Total</th>
                                <td>{{total_joinging_price}}/-</td> -->
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <strong>Note:</strong>Joining fees of Rs. {{joiningmount.joining_amount}}/- is to be deposited at the time of submission of application.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary text-uppercase">Your Job Details</h3>
                    <span class="line-sep-blue"></span>
                    <p>
                        Upon joining as Griham Freelancer Employee you are now eligible to promote our services and do a marketing business to generate leads for different types of Jobs only. i.e. you now become the Boss of your&nbsp;own marketing business and your business totally depends upon your plan of action and strategy. Griham does not pressurizes for any type of lead generation and does not fix targets so to make your business totally yours. Griham only helps and supports their FLE to run their business smoothly.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary text-uppercase">Your Direct Income & Sale Incentives</h3>
                    <span class="line-sep-blue"></span>
                    <table class="table table-bordered table-striped">
                        <caption>Sales Incentive is calculated on a fixed incentive for each service promoted by our FLE and their groups which are as follows:</caption>
                        <tbody>
                            <tr>
                                <th>Serial No.</th>
                                <th>Services</th>
                                <th>Your Insentives</th>
                                <th>Business Type</th>
                            </tr>
                            <tr v-for="(income,index) in incentiveList">
                                <th>{{index+1}} </th>
                                <td>{{income.service}}</td>
                                <td>{{income.incentive}}</td>
                                <td>{{income.service_type}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: center">​Additional Performance Bonus of {{bonusList[0].bonus}}% of the total Profit Value of the group members under your position.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary text-uppercase">FLE Award</h3>
                    <span class="line-sep-blue"></span>
                    <table class="table table-bordered table-striped">
                        <caption>
                            <strong>Note:</strong> Each position right from FLE-1 to FLE-9 is not fixed and it strictly depends upon the total business volume of the individual.
                            <br/> Each fle employees who achieves first 6 position are also rewarded with certain surprise gifts for their better performance and hard work in the company.
                            <br/> fle employees who achieves first three positions continuously for at least three months are eligible to get fixed salary of rs. 5000/month for 1 year.
                        </caption>
                        <thead>
                            <tr>
                                <th>FLE Position</th>
                                <th>Bonus & Incentives</th>
                                <th>Other Rewards</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(bonus,index) in bonusList">
                                <th>FLE-{{index+1}}</th>
                                <td>{{bonus.bonus}}% of total Profit Value of {{bonusList.length-index}} Employees </td>
                                <td>{{bonus.reward}} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    var bonus = new Vue({
        created: function() {
            this.prepareData();
        },
        data:{
            c_data: <?=json_encode($data)?>,
            joiningList:[],
            joiningmount:{},
            incentiveList:[],
            bonusList:[]
        },
        el:"#how_to_work",
        methods: {
            prepareData:function(){
                var self = this;
                _.each(this.c_data,function(data,index){
                    console.log(data.doc_type);
                    switch(data.doc_type){
                        case 'fees':
                            self.joiningmount = data;
                            break;
                        case 'joining_kits':
                            self.joiningList.push(data);
                            break;
                        case 'direct_sale':
                            self.incentiveList.push(data);
                            break;
                        case 'bonus_incentive':
                            self.bonusList.push(data);
                            break;
                       
                    }
                    
                });
            }
        }
    });
</script>
