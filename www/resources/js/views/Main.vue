<template>
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">How to use?</h1>

                <div class="card-columns">
                    <div class="card shadow">
                        <div class="card-body">
                            To upload a file press upload button.
                            <br/>
                            <br/>
                            Your changes are saved automatically after every change.
                            <br/>
                            <br/>
                            File type must be .txt or .csv
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <img src="../../photos/save.png" style="width:100%;"/>
                            </div>
                            <hr>
                            To save right click on a table and press Save as...
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <img src="../../photos/formula1.png" style="width:100%;"/>
                                <img src="../../photos/formula2.png" style="width:100%;"/>
                            </div>
                            <hr>
                            Application supports nested functions.
                            <br/>
                            <br/>
                            Csv files are downloaded and saved with formulas in cells where they have been.
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <h2>Other supported features:</h2>
                            <br/>
                            <br/>
                            Grouping cells: =SUM(A5:A8)
                            <br/>
                            <br/>
                            Dragging formulas.
                            <br/>
                            <br/>
                            Adding rows, columns.
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</template>

<script>
    export default {
        name: 'Main',
    }
</script>


<style scoped>

</style>
