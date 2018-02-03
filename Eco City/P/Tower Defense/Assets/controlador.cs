using UnityEngine;
using System.Collections;

public class controlador : MonoBehaviour {

	NavMeshAgent nav_mesh;
	public Transform myTarget;

	//public Transform path1;
	//public Transform path2;
	//public Transform path3;
	//public Transform path4;

	// Use this for initialization
	void Start () {
		nav_mesh = this.gameObject.GetComponent<NavMeshAgent> ();

		NavMeshPath myPath = new NavMeshPath();

		//myPath.corners = new Vector3[4];
		//myPath.corners [0] = path1.position;
		//myPath.corners [1] = path2.position;
		//myPath.corners [2] = path3.position;
		//myPath.corners [3] = path4.position;

		//nav_mesh.SetPath (myPath);

		//nav_mesh.SetDestination (myTarget.position);
	}
	
	// Update is called once per frame
	void Update () {
		nav_mesh.SetDestination (myTarget.position);
	}

}
