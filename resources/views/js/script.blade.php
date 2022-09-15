<script>

    /*
    * Drag events
    * */
    function dragFromToDo(ev) {
        ev.dataTransfer.setData("id", ev.target.id);
    }


    function dragFromInProgress(ev) {
        ev.dataTransfer.setData("id", ev.target.id);
    }


    function allowDrop(ev) {
        ev.preventDefault();
    }

    /*
    * Drop events
    * */

    // Not is use, Get route used
    function dropFromToDoGet(ev) {
        let url = "{{ route('task.updateInProgress', ':id') }}";
        url = url.replace(':id', ev.dataTransfer.getData("id"));
        document.location.href=url;
        ev.preventDefault();
        var data = ev.dataTransfer.getData("id");
        ev.target.appendChild(document.getElementById(data));
    }

    // Post route used to update status = inprogress
    function dropFromToDo(ev) {

        var request = new XMLHttpRequest();
        var url = "{{ route('task.updateInProgress') }}";
        request.open("POST", url, true);
        request.setRequestHeader("Content-Type", "application/json");
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                console.log("inprogress");
            }
        };

        var data = JSON.stringify({"id": ev.dataTransfer.getData("id")});

        request.send(data);

        ev.preventDefault();
        var data = ev.dataTransfer.getData("id");
        ev.target.appendChild(document.getElementById(data));
    }

    // Not is use, Get route used
    function dropFromInProcessGet(ev) {
        let url = "{{ route('task.updateDone', ':id') }}";
        url = url.replace(':id', ev.dataTransfer.getData("id"));
        document.location.href=url;
        ev.preventDefault();
        var data = ev.dataTransfer.getData("id");
        ev.target.appendChild(document.getElementById(data));
    }


    // Post route used to update status = done
    function dropFromInProcess(ev) {

        var request = new XMLHttpRequest();
        var url = "{{ route('task.updateDone') }}";
        request.open("POST", url, true);
        request.setRequestHeader("Content-Type", "application/json");
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                console.log("done");
            }
        };

        var data = JSON.stringify({"id": ev.dataTransfer.getData("id")});

        request.send(data);

        ev.preventDefault();
        var data = ev.dataTransfer.getData("id");
        ev.target.appendChild(document.getElementById(data));
    }

</script>