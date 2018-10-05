<template>

    <div class="row">
        <div class="col-sm-12">
            <h4>Расценки за грамм металлов</h4>
        </div>


        <hr>
        <div class="col-sm-12">
            <div v-if="statusesNumber" class="form-group">
                <table class="" id="ratesTable">
                    <tr>
                        <th></th>
                        <th>Проба</th>
                        <th v-for="status in statuses">
                            {{ status.title_ru }}
                        </th>
                        <th></th>
                    </tr>
                    <tr v-for="(hallmark, index) in hallmarks">
                        <td><span @click="addHallmark"  v-if="hallmarks.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                        <td><input type="number" class="form-control" name="hallmarks[]" v-model="hallmark.hallmark" required></td>

                        <td v-for="status in statuses">
                            <input v-if="create" :name="getPriceNames(hallmark.hallmark, status.id)" type="number" class="form-control" placeholder="цена за гр" min="0.01" step="0.01" required>
                            <input v-else :name="getPriceNames(hallmark.hallmark, status.id)" @click="getIndex(hallmark.id, status.id)" v-model="prices[0].value" type="number" class="form-control" placeholder="цена за гр" min="0.01" step="0.01" required>
                            <!--<input v-else :name="getPriceNames(hallmark.hallmark, status.id)" v-model="getIndex(hallmark.id, status.id)" type="number" class="form-control" placeholder="цена за гр" min="0.01" step="0.01" required>-->
                            <!--<input v-else :name="getPriceNames(hallmark.hallmark, status.id)" :value="getPrice(hallmark.id, status.id)" type="number" class="form-control" placeholder="цена за гр" min="0.01" step="0.01" required>-->
                        </td>
                        <td><span @click="removeHallmark(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
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
                hallmarks: [{hallmark: ''}],
                show: false,
                prices: [],
                create: true
            }
        },
        props: ['tariff'],
        mounted() {
            // console.log(this.tariff);
            if (this.tariff){
                this.hallmarks = this.tariff.hallmarks;
                this.prices = this.tariff.prices;
                this.create = false;
                console.log(this.prices);
                this.getIndex();
                // this.$nextTick(function () {
                //     // Code that will run only after the
                //     // entire view has been rendered
                //     this.create = false;
                // })
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
            addHallmark () {
                // this.create = true;

                this.hallmarks.push({ hallmark: ''});
                // this.hallmarks.push('');
            },
            removeHallmark (index) {
                this.hallmarks.splice(index, 1);
            },
            getPriceNames(hallmark, statusId) {
                return 'prices' + '[' + hallmark + ']' + '[' + statusId + '][]';
            },
            getPrice (hallmarkId, statusId) {
                let prices = this.prices;

                for (let i = 0; i < prices.length; i++) {
                    if (prices[i].calc_hallmark_id === parseInt(hallmarkId) && prices[i].calc_status_id === parseInt(statusId)){
                        return prices[i].value;
                    }
                }
            },
            getIndex (hallmarkId, statusId){
                // console.log(_.findIndex(this.prices, function(item) { return item.calc_status_id === statusId && item.calc_hallmark_id === hallmarkId; }));
                let index = _.findIndex(this.prices, function(item) { return item.calc_status_id === statusId && item.calc_hallmark_id === hallmarkId; });
                console.log('prices[' + index + '].value');
                // return 'prices[' + index + '].value';
            }
        }
    }
</script>

<style>
    .fa-plus-circle {
        color: green;
    }
    .fa-trash {
        color: red;
    }
</style>