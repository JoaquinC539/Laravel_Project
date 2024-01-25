export const testFunc=()=>{
    return('Este es una mensaje importado');
}
export const getTemplate=async (templateName)=>{
    try {
        const promise=await fetch(`/template/${templateName}`,{
            method:"GET",
            headers:{
                "Content-Type":"application/json"
            }
        });
        const response=await promise.json();
        const template=await response['template'];
        return template
    } catch (error) {
        return {error:true,failure:error};
    }
}
export const getData=async (endpoint)=>{
    try {
        const promise=await fetch(endpoint,{
            method:"GET",
            headers:{
                "Content-Type":"application/json"
            }
        });
        const response=await promise.json();
        return await response
    } catch (error) {
        return json({error:true,failure:error});
    }
}

export const fetchDelete=async (endpoint,csfrToken)=>{
    try {
        const promise=await fetch(endpoint,{
            method: 'DELETE',
            headers:{
                "Content-Type":"application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN":csfrToken
            }
        });
        const response=await promise.json();
        return await response;
    } catch (error) {
        return json({error:true,failure:error});
    }
    
}

export const tableBuilder=(data,headerTemplate,rowTemplate,action=false)=>{
    const colTemplate=Handlebars.compile(headerTemplate);
    const dataTemplate=Handlebars.compile(rowTemplate);
    const headers={cols:Object.keys(data[0])};
    if(action){
        headers.cols.unshift("Acciones");
    }
    let table="";
    table+=colTemplate(headers);
    let rows={}
    rows={data:data,action:action};
    table+=dataTemplate(rows);
    return table;
}

export const handleDelete=()=>{

}