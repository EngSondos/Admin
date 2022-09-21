<?php
namespace Models;
interface Crud{
    function create();
    function update($id);
    function delete($id);
    function read();
}
