<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        <h1>Manage the Plant</h1>
            <div class="col-xs-12">
                <h3>Reboot Factory</h3>
                <p>This button will reset the factory's inventory, debt and reset the starting balance.</p>
                <p><b class="danger">WARNING:</b> There is no turning back from this action.</p>
                    <button class="btn btn-block btn-danger" id="rebootMeBtn">Reboot</button>
            </div>
            <div class="col-xs-12">
                <h3>PRC Registration</h3>
                <form>
                    <div class="form-group">
                        <label for="passcodeInput">Passcode Input</label>
                        <input type="text" class="form-control" id="passcodeInput" aria-describedby="passcodeInput" placeholder="Enter Secret Passcode">
                    </div>
                </form>
                <div>
                    <button class="btn btn-info">Register</button>
                </div>
            </div>
            <div class="col-xs-12">
                <h3>Sell Built Robots</h3>
                <p>This is a list of all of the previously built robots at this plant.</p>
                <table class="table table-bordered">
                    {builtRobots}
                        <tr>
                            <td>{id}</td>
                            <td>{cacode}</td>
                            <td>{head}</td>
                            <td>{torso}</td>
                            <td>{legs}</td>
                            <td>{created}</td>
                            <td>{model}</td>
                            <td>{line}</td>
                            <td><button class="btn btn-success">Sell</button></td>
                        </tr>
                    {/builtRobots}
                </table>
            </div>
        </div>
    </div>
</div>
