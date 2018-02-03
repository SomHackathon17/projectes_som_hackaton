using UnityEngine;
using System.Collections;

public class grid : MonoBehaviour {

	public int sizeX;
	public int sizeY;

	public float node_size;

	public Node[,] grid_1;

	// Use this for initialization
	void Start () {
		CreateGrid ();
	}
	
	// Update is called once per frame
	void Update () {
	}

	void OnDrawGizmos(){
		Gizmos.color = Color.blue;
		//CreateGrid ();
		if (grid_1 != null) {
			
			foreach (Node n in grid_1) {

				Gizmos.DrawWireCube (n.WorldPosition, Vector3.one * (float)node_size * 0.9f);
			}
		}
	}

	void CreateGrid (){
		
		grid_1 = new Node[sizeX, sizeY];

		for (int x = 0; x < sizeX; x++) {

			for (int y = 0; y < sizeY; y++) {
				Vector3 pos = new Vector3 (node_size / 2 + x * node_size, node_size / 2 + y * node_size, 0);
				grid_1 [x, y] = new Node (x, y, pos);
			}
		}
	}

	public Node returnNode(float pos_x, float pos_y)
	{
		int int_x = (int)pos_x;
		int int_y = (int)pos_y;

		return grid_1 [int_x, int_y];
	}
		
}

public class Node{

	public int pos_y;

	public int pos_x;

	public Vector3 WorldPosition;

    public bool isPipe;

	public bool isPoint;

	public bool isPowerUp;

	public int G;
	public int H;
	public int F;

	public Node ( int _pos_x, int _pos_y, Vector3 _position ){

		pos_x=_pos_x;
		pos_y=_pos_y;

		WorldPosition = _position;
	}
}
