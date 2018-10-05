<template>

    <div class="row">
        <div class="col-sm-12">
            <h4>Ставки</h4>
        </div>
        <div class="col-sm-3">
            <h5>Максимальные суммы</h5>
            <form>
                <div class="form-group">
                    <table>
                        <tr  v-for="(maxAmount, index) in maxAmounts">
                            <td><span @click="addMaxAmount"  v-if="maxAmounts.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                            <td><input type="text" class="form-control" placeholder="до" v-model="maxAmount.value" required></td>
                            <td><span @click="removeMaxAmount(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>

                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <h5>Сроки залога <small>(дней)</small></h5>
            <form>
                <div class="form-group">
                    <table>
                        <tr v-for="(term, index) in terms">
                            <td><span @click="addTerm"  v-if="terms.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                            <!--<cleave placeholder="от - до" :options="{ delimiter: ' - ', blocks: [2, 2] }"  class="form-control" v-model="terms[index]"></cleave>-->
                            <td>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="от" v-model="term.from" required>
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="до" v-model="term.to" required>
                                    </div>
                                </div>
                            </td>
                            <td><span @click="removeTerm(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>

                        </tr>
                    </table>
                </div>

                <!--<div class="form-row col-sm-4" v-for="(term, index) in terms">-->
                    <!--<div class="col" v-if="terms.length == index+1">-->
                        <!--<span @click="addTerm"><i class="fa fa-trash" aria-hidden="true"></i></span>-->
                    <!--</div>-->
                    <!--<div class="col">-->
                        <!--<input type="text" class="form-control" placeholder="от" v-model="terms[index]">-->
                    <!--</div>-->
                    <!--<div class="col">-->
                        <!--&lt;!&ndash;<input type="number" class="form-control" placeholder="до">&ndash;&gt;-->
                        <!--<span @click="removeTerm"><i class="fa fa-trash" aria-hidden="true"></i></span>-->
                    <!--</div>-->
                <!--</div>-->
            </form>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-12">&nbsp;</div>
        <div class="col-sm-12">
            <div v-if="statusesNumber" class="form-group">
                <table class="" id="ratesTable">
                    <tr>
                        <th>Сумма</th>
                        <th v-for="status in statuses">
                            {{ status.title_ru }}
                        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <td v-for="status in statuses">
                            <table>
                                <tr class="terms-row">
                                    <td v-for="(term, index) in terms" class="term-column">
                                        <div class="form-row">
                                            <div class="col">
                                                <!--<input v-for="termProp in term" :value="termProp" name="term[1][]" type="text" class="form-control" placeholder="">-->
                                                <input :value="getTermValue(term)" type="text" class="form-control" placeholder="от - до">
                                                <!--<input v-model="terms[index]" name="term[1][]" type="text" class="form-control" placeholder="от - до">-->
                                            </div>
                                            <!--<div class="col">-->
                                                <!--<input  name="term[1][]" type="number" class="form-control" placeholder="до">-->
                                            <!--</div>-->
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr v-for="(maxAmount, amount) in maxAmounts">
                        <td><input type="number" class="form-control" placeholder="введите сумму" name="max_amount[]" v-model="maxAmount.value" required></td>

                        <td v-for="status in statuses">
                            <table>
                                <tr>
                                    <td v-for="(term, index) in terms">
                                        <div class="form-row">
                                            <div class="col">
                                                <input v-if="create" :name="getRateNames(maxAmount.value, status.id, getTermValue(term))" min="0.001" step="0.001" type="number" class="form-control" placeholder="ставка" required>
                                                <input v-else :name="getRateNames(maxAmount.value, status.id, getTermValue(term))" :value="getRate(maxAmount.id, status.id, term.id)" min="0.001" step="0.001" type="number" class="form-control" placeholder="ставка" required>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>

            </div>
            <div v-else>Статусы пользователей не загружены</div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                statuses: [],
                maxAmounts: [{
                    value: '',
                }],
                // terms: [{
                //     from: 1,
                //     to: 7
                // }],
                terms: [{
                    from: '',
                    to: ''
                }],
                // from: 0,
                // to: 0,
                show: false,
                rates: [],
                create: true
            }
        },
        props: ['tariff'],
        mounted() {
            // console.log(this.tariff);
            if (this.tariff){
                this.terms = this.tariff.terms;
                this.maxAmounts = this.tariff.max_amounts;
                this.rates = this.tariff.rates;
                this.create = false;
            }
            axios.get('/admin/calculator/get-statuses')
                .then((response) => {
                    this.statuses = response.data
                });
        },
        computed: {
            statusesNumber() {
                return this.statuses.length;
            },
        },
        methods: {
            addTerm () {
                //let termsNumber = this.guests.length + 1;
                this.terms.push({
                    from: '',
                    to: ''
                });
                // this.terms.push({ from: this.from, to: this.to});
            },
            removeTerm (index) {
                this.terms.splice(index, 1);
            },
            addMaxAmount () {

                this.maxAmounts.push({value: ''});
                // this.maxAmounts.push('');
            },
            removeMaxAmount (index) {
                this.maxAmounts.splice(index, 1);
            },
            getRateNames(amount, statusId, term) {
                let string = 'rates' + '[' + amount + ']' + '[' + statusId + ']' + '[' + term + '][]';
                return string;
            },
            getTermValue(term) {
                return '' + term.from + ' - ' + term.to;
            },
            getRate (amountId, statusId, termId) {
                let rates = this.rates;
                for (let i = 0; i < rates.length; i++) {
                    // console.log(rates[i]);
                    if (rates[i].calc_max_amount_id === parseInt(amountId) && rates[i].calc_status_id === parseInt(statusId) && rates[i].calc_term_id === parseInt(termId)){
                        return rates[i].value;
                    }
                }
                // rates.forEach(function (rate, amountId, statusId, termId) {
                //     if (rate.calc_amount_id === amountId && rate.calc_status_id === statusId && rate.calc_term_id === termId){
                //         return rate.value;
                //     }
                // });
            }
        }
    }
</script>
