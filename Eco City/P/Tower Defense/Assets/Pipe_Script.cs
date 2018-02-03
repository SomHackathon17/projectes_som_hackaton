using UnityEngine;
using System.Collections;

public class Pipe_Script : MonoBehaviour {

    grid gridReference;

    float emissionRadius = 0.2f;

    // Use this for initialization
    void Start () {
        gridReference = FindObjectOfType<grid>();
    }
	
	// Update is called once per frame
	void Update ()
    {
		
        if (Physics.CheckSphere(transform.position, emissionRadius))
        {
            // pipe position
            // emission Radius

            gridReference.grid_1[(int)transform.position.x, (int)transform.position.y].isPipe = true;
            // vamos al grid i le decimos que en el array a la posicion en la que estamos hay una tuberia
        }
        // ahora el grid sabe donde hay tuberias y donde no las hay
	}
}
