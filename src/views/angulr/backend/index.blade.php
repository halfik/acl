<div class="hbox hbox-auto-xs hbox-auto-sm" ng-controller="aclCtrl">
    <div class="col w-lg bg-light dk b-r bg-auto">

        <!-- show search results for user input -->
        <div class="wrapper-md">
            <h4>[[ _('Role') ]]</h4>

            <ul class="list-group list-group-sp">
                @foreach($roleList AS $role)
                    <li class="list-group-item">
                        <a href ng-click="edit([[ $role->id ]])">[[ $role->display('name') ]]</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col">
        <div  ng-show="editData">
            <div class="wrapper-lg clearfix bg-info dker">
                <h3>{{editData.role.name}}</h3>
            </div>

            <div class="list-group no-border no-radius" ng-repeat="resource in editData.resources">
                <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-8">
                            {{resource.name}}
                        </th>
                        <th class="col-md-2">
                        </th>
                    </tr>
                    </thead>

                    <tbody  ng-if="resource.childs"  ng-repeat="child in resource.childs">
                    <tr>
                        <td>{{child.name}}</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>