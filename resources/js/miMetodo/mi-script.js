import { getTemplate,getData,tableBuilder } from "/resources/js/globals.js";
try {
    const data=await getData("/vendedor");
    const headerTemplate=await getTemplate('tableHeader');
    const rowTemplate=await getTemplate('vendedorRow');
    const table=tableBuilder(data,headerTemplate,rowTemplate,true)
    document.getElementById('miMetodoTable').innerHTML=table
} catch (error) {
    console.error(error)
}


